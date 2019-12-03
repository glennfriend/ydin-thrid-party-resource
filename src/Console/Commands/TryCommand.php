<?php

namespace ThirdPartyResource\Console\Commands;

use Illuminate\Console\Command;
use ThirdPartyResource\ResourceBuild;

/**
 * Class TryCommand
 * @package ThirdPartyResource\Console\Commands
 */
class TryCommand extends Command
{
    /**
     *
     */
    protected $signature = 'third-party-resource:try';

    /**
     *
     */
    protected $description = 'try something';

    /**
     * @param ResourceBuild $resourceBuild
     */
    public function handle(ResourceBuild $resourceBuild)
    {
        $this->resourceBuild = $resourceBuild;

        // $this->tryBeeTemplates30second();
        // $this->tryBeeTemplate();
        $this->justTest();
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     *
     */
    protected function tryBeeTemplates30second()
    {
        $api = $this->resourceBuild->beeFree()->templates();
        echo ($api->getJsonCache([
            'page' => 1,
        ], 30));
    }

    /**
     *
     */
    protected function tryBeeTemplate()
    {
        $api = $this->resourceBuild->beeFree()->template();
        echo ($api->getJsonForever([
            'id' => 371,
        ]));
    }

    /**
     *
     */
    protected function justTest()
    {

    }

    // --------------------------------------------------------------------------------
    //  tool
    // --------------------------------------------------------------------------------

    protected function jsonFormat($jsonText)
    {
        $array = json_decode($jsonText, true);
        return json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

}
