<?php

namespace ThirdPartyResource\Console\Commands;

use Exception;
use App;
use Illuminate\Console\Command;
use ThirdPartyResource\ResourceBuild;

/**
 * acceptance test (驗收測試)
 *
 * 在做 accpetance test 時
 * 每個東西都是準備好的, 都是真的
 * 不會使用 stub 或是 fake 來代替
 *
 * Class ApiAcceptanceTestCommand
 * @package ThirdPartyResource\Console\Commands
 */
class ApiAcceptanceTestCommand extends Command
{
    /**
     *
     */
    protected $signature = 'third-party-resource:api-acceptance-test';

    /**
     *
     */
    protected $description = 'Warning ! 對 production 的 API 進行真實的測試 !';

    /**
     * @param ThirdPartyResource $resource
     */
    public function handle(ResourceBuild $resourceBuild)
    {
        $this->help();
        $this->showAllList();
        $this->validate();
        $indexTotal = count($this->list());
        $allIndex = range(1, $indexTotal);
        $number = $this->anticipate('input index number (up/down)', $allIndex);

        if (! $number) {
            exit;
        }

        // show params
        $row = $this->getByNumber($number);
        if (! $row) {
            exit;
        }

        echo '[Class]' . "\n";
        echo ' ';
        $this->showClassStyle($row);
        echo "\n";

        $ask = true;
        if ($row['params']) {
            echo '[Params]' . "\n";
            dump($row['params']);
            $ask = $this->confirm('use the params?');
        }

        if (! $ask) {
            exit;
        }

        echo '---------- execute ----------' . "\n";

        $class = app($row['class']);
        $method = $row['method'];
        if (isset($row['params'])) {
            $result = $class->$method($row['params']);
        }
        else {
            $result = $class->$method();
        }

        $this->output($result, $row);


        // cache
        $method = $row['method'];
        if (method_exists($class, $method)) {
            echo "\n";
            echo '---------- cache ----------' . "\n";

            if (in_array($method, ['getArrayForever', 'getJsonForever'])) {
                $cacheId = $class->guessCacheNameByKey($row['params']);
                echo $cacheId. "\n";
            }
            else {
                echo 'no cache';
            }
        }

    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * 如果有參數, 請將參數寫在 tests/data/*.php
     * 參數檔案的格式為
     *
     *      tests/data/{$className}.{$methodName}.php
     *
     * @return array
     */
    protected function list(): array
    {
        static $rows;

        if ($rows) {
            return $rows;
        }

        // list config
        $rows = include('ApiAcceptanceTestCommand.config.php');

        foreach ($rows as $index => $row) {
            $tmp = explode('\\', $row['class']);
            $filename = array_pop($tmp);
            $file = realpath(__DIR__ . '/data/' . $filename . '.' . $row['method'] . '.php');
            // echo '=> ' . $file."\n";

            $params = [];
            if (file_exists($file)) {
                $params = include $file;
            }
            $rows[$index]['params'] = $params;
        }

        return $rows;
    }

    protected function help()
    {
        $this->warn('<fg=yellow>Description:</>');
        $this->line('  用 command line 包裝的 acceptance test (驗收測試)');
        $this->line('  在做 accpetance test 時');
        $this->line('  每個東西都是準備好的, 都是真實的');
        $this->line('  不是測試');
        $this->line('  不會使用 stub 或是 fake 來代替');
        $this->line('');

        $this->warn('<fg=yellow>Warning:</>');
        $this->line('  <fg=red>會對 production 進行 read/write</>');
        $this->line('');

        $this->warn('<fg=yellow>list:</>');
    }

    protected function output($result, array $row)
    {
        $method = $row['method'];

        if (in_array($method, ['send', 'getResponse'])) {
            $response = $result;
            echo 'Status Code: ' . $response->getStatusCode() .  "\n";
            echo 'Body Contents: ' . "\n";

            $contents = $response->getBody()->getContents();
            $json = $this->jsonFormat($contents); // NOTE: 並不是每一個內容都是 json formate
            dump($json);
        }
        else {
            dump($result);
        }
    }

    protected function validate()
    {
        if (App::environment('local')
            || App::environment('localhost')
            || App::environment('staging')) {
            return;
        }

        $this->line('');

        $this->warn('<fg=yellow>Env:</>');
        $this->line('  該程式不能用於 production');
        $this->line('');
        $this->line('  Exit !');

        exit;
    }

    // --------------------------------------------------------------------------------
    //  tool
    // --------------------------------------------------------------------------------

    protected function getByNumber(int $number): array
    {
        $index = $number - 1;
        $rows = $this->list();
        if (isset($rows[$index])) {
            return $rows[$index];
        }

        return [];
    }

    /**
     * @param $jsonText
     * @return string
     */
    protected function jsonFormat($jsonText): string
    {
        $array = json_decode($jsonText, true);
        return json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    protected function showAllList()
    {
        foreach ($this->list() as $index => $row) {
            $class = explode('\\', $row['class']);
            unset($class[0], $class[1], $class[2]);
            $class = join('\\', $class);

            $showParamsContent = null;
            if ($row['params']) {
                $showParamsContent = '....';
            }

            $show = $class . '->' . $row['method'] . "({$showParamsContent})";
            printf("  %02s %-1s", ($index+1), $show);
            echo "\n";
        }
    }

    protected function showClassStyle(array $row, bool $newLine=true)
    {
        $showParamsContent = null;
        if ($row['params']) {
            $showParamsContent = '....';
        }

        $end = null;
        if ($newLine) {
            $end = "\n";
        }
        echo $row['class'] . '->' . $row['method'] . "({$showParamsContent})" . $end;
    }

}
