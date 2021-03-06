<?php

namespace komicho;

class packagist
{
    protected $packages = [];
    protected $ops = [];

    public function __construct()
    {
        $file = file_get_contents(__DIR__.'/../../../../composer.lock');
        $this->packages = json_decode($file, true)['packages'];
    }

    public function get($ops = ['all'])
    {
        if (!in_array('name', $ops) && !in_array('version', $ops)) {
            $ops = ['name', 'version'];
        }
        $this->ops = $ops;
        return $this;
    }

    public function list()
    {
        $outPackage = [];
        foreach ($this->packages as $package) {

            if (in_array('name', $this->ops) && in_array('version', $this->ops)) {
                $outPackage[] = [
                    'name' => $package['name'],
                    'version' => $package['version'],
                ];
            } else {
                if (in_array('name', $this->ops)) {
                    $outPackage[] = [
                        'name' => $package['name'],
                    ];
                }
    
                if (in_array('version', $this->ops)) {
                    $outPackage[] = [
                        'version' => $package['version'],
                    ];
                }
            }

        }
        return $outPackage;
    }

    public function nameVersion($name = false)
    {
        $outPackage = [];

        foreach ($this->packages as $package) {
            $outPackage[$package['name']] = $package['version'];
        }

        if (!$name) {
            return $outPackage;
        }

        if (!isset($outPackage[$name])) {
            return 'Your app does not contain this package';
        }

        return $outPackage[$name];
    }

    public function getInfoLocal($get = false)
    {
        $outPackage = [];
        foreach ($this->packages as $package) {
            $outPackage[$package['name']] = $package;
        }
        if (!$get) {
            return $outPackage;
        }
        if ($get) {
            return $outPackage[$get];
        }
    }

    public function getInfoRemotely($name = false)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://packagist.org/packages/' . $name . '.json');
        return $res->getBody();
    }

    public function count()
    {
        return count($this->packages);
    }
}