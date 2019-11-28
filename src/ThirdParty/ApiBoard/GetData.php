<?php
declare(strict_types = 1);
namespace ThirdPartyResource\ThirdParty\ApiBoard;

/**
 * feature
 *      - getJson()
 *      - getArray()
 *
 * required
 *      - 請先實作 getResponse(array $row)
 *
 * Trait GetData
 * @package ThirdPartyResource\ThirdParty\ApiBoard
 */
trait GetData
{

    /**
     * 從 getReponse() 取得 body json string
     *
     * @return string
     */
    public function getJson(array $row=[]): string
    {
        list($json, $response) = $this->getJsonAndResponse($row);
        return $json;
    }

    /**
     * 從 getReponse() 取得 body array
     *
     * @param array $row
     * @return array
     */
    public function getArray(array $row=[]): array
    {
        $text = $this->getJson($row);
        return json_decode($text, true);
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * @param array $row
     * @return array
     */
    protected function getJsonAndResponse(array $row=[])
    {
        if ($row) {
            $response = $this->getResponse($row);
        }
        else {
            $response = $this->getResponse();
        }

        $body = (string) $response->getBody();
        $array = json_decode($body, true);
        $json = $this->_jsonEncodeFormat($array);

        return [$json, $response];
    }

}
