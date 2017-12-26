<?php

namespace ABCP\TecDoc;

class TecDocFunctions
{
    /*
     * без применения фильтров!!!
     */
    protected $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    /*
     * 2.6.1
     * Получение справочника производителей
     * Операция: manufacturers
     */

    public function getManufacturers()
    {
        $url = $this->config['host'] . '/manufacturers?' . http_build_query([
                    'userlogin' => $this->config['login'],
                    'userpsw' => $this->config['password'],
                    'userkey' => $this->config['key']
                ]);
        $origin_file = file_get_contents($url);
        $result = json_decode($origin_file);

        return $result;
    }

    /*
     * 2.6.2
     * Получение списка моделей
     * Операция: models
     */

    public function getModels($manufacturerId)
    {
        $url = $this->config['host'] . '/models?' . http_build_query([
                'userlogin' => $this->config['login'],
                'userpsw' => $this->config['password'],
                'userkey' => $this->config['key'],
                'manufacturerId' => $manufacturerId
            ]);
        $origin_file = file_get_contents($url);
        $result = json_decode($origin_file);

        return $result;
    }

    /*
     * 2.6.3
     * Получение списка модификаций
     * Операция: modifications
     */

    public function getModifications($manufacturerId, $modelId)
    {
        $url = $this->config['host'] . '/modifications?' . http_build_query([
                'userlogin' => $this->config['login'],
                'userpsw' => $this->config['password'],
                'userkey' => $this->config['key'],
                'manufacturerId' => $manufacturerId,
                'modelId' => $modelId
            ]);
        $origin_file = file_get_contents($url);
        $result = json_decode($origin_file);

        return $result;
    }

    /*
     * 2.6.8
     * Получение списка применимости
     * Операция: adaptabilityManufacturers
     */
    // !!!!!!!!!!
    public function getAdaptabilityManufacturers($brandName, $number)
    {
        $url = $this->config['host'] . '/adaptabilityManufacturers?' . http_build_query([
                'userlogin' => $this->config['login'],
                'userpsw' => $this->config['password'],
                'userkey' => $this->config['key'],
                'brandName' => $brandName,
                'number' => $number
            ]);
        $origin_file = file_get_contents($url);
        $result = json_decode($origin_file);

        return $result;
    }



    public function getAdaptabilityModels($brandName, $number, $manufacturerName)
    {
        $url = $this->config['host'] . '/adaptabilityModels?' . http_build_query([
                'userlogin' => $this->config['login'],
                'userpsw' => $this->config['password'],
                'userkey' => $this->config['key'],
                'brandName' => $brandName,
                'number' => $number,
                'manufacturerName' => $manufacturerName
            ]);
        $origin_file = file_get_contents($url);
        $result = json_decode($origin_file);

        return $result;
    }

    public function getAdaptabilityModifications($brandName, $number, $manufacturerName, $modelName)
    {
        $url = $this->config['host'] . '/adaptabilityModifications?' . http_build_query([
                'userlogin' => $this->config['login'],
                'userpsw' => $this->config['password'],
                'userkey' => $this->config['key'],
                'brandName' => $brandName,
                'number' => $number,
                'manufacturerName' => $manufacturerName,
                'modelName' => $modelName
            ]);

        $origin_file = file_get_contents($url);
        $result = json_decode($origin_file);

        return $result;
    }

}


