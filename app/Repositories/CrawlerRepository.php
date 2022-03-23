<?php

namespace App\Repositories;

use App\Interfaces\CrawlerInterface;
use App\Models\Crawler;
use Exception;
use DOMDocument;
use DOMXpath;

class CrawlerRepository implements CrawlerInterface
{
    private $url;

    public function __construct(){
        $this->url = "https://www.apontador.com.br/local/alimentos-e-bebidas";
    }

    public function curl(): array
    {
        $this->message("Curl starting!");
        try{
            $options = array(
                CURLOPT_URL            => $this->url,
                CURLOPT_RETURNTRANSFER => true,     // return web page
                CURLOPT_HEADER         => false,    // don't return headers
                CURLOPT_CONNECTTIMEOUT => 500,      // timeout on connect
                CURLOPT_TIMEOUT        => 500,      // timeout on response
                CURLOPT_POST           => 0,
                CURLOPT_HTTPGET        => false,
                CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13'
            );

            $ch = curl_init();
            curl_setopt_array( $ch, $options );

            $output['content'] = curl_exec( $ch );
            $output['err']     = curl_errno( $ch );
            $output['errmsg']  = curl_error( $ch );
            $output['header']  = curl_getinfo( $ch );

            $this->message("Curl finished!");
            curl_close($ch);
            return $output;
        }catch(\Exception $e){
            echo 'Error: '.$e->getMessage();
        }
    }

    public function search(): array
    {
        $this->message("Search starting!");
        try{
            $responseFromCurl =  $this->curl();

            $doc = new DOMDocument;
            @$doc->loadHTML($responseFromCurl['content']);
            $doc->preserveWhiteSpace = false;

            $xpath = new DOMXpath($doc);
            $nodeList = $xpath->query("//div[@class=\"search-result__info\"]");
            //$values = $xpath->query(".//div[@class=\"grid-x grid-margin-x\"]", $nodeList->item(0));

            $res = array();
            if(count($nodeList) > 0){
                foreach($nodeList as $key => $value){
                    $result = $xpath->query(".//div", $value);
                    $title = explode('0', $result->item(0)->textContent);
                    $phone = explode('ver telefone  ', $result->item(4)->textContent);
                    $varPhone = isset($phone[1]) ? trim($phone[1]): '';
                    $res[$key] = [
                        'title' => trim($title[0]),
                        'address' => trim($result->item(2)->textContent),
                        'phone' => $varPhone
                    ];
                }
            }
            $this->message("Search finished!");
            return $res;
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function save($data): void
    {
        $this->message("Save starting!");
        try {
            if(isset($data) && count($data) > 0){
                $this->truncateTable();
                foreach($data as $res){
                    $crawler = new Crawler();
                    $crawler->title = $res['title'];
                    $crawler->address = $res['address'];
                    $crawler->phone = $res['phone'];
                    $crawler->save();
                }
                $this->message("Save finished!");
            }else{
                $this->message("Nothing to save!");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function truncateTable(): void
    {
        try{
            $this->message("Truncate starting");
            Crawler::truncate();
            $this->message("Truncate finished");
        }catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function message($msg): void
    {
        echo $msg."\n";
    }

    public function init(): void{
        try{
            $data = $this->search();
            $this->save($data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}
