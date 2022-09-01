<?php

namespace App\Services;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use SimpleXMLElement;

class QuotesService
{
    const QUOTES_XML_URL = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=%s';

    public function get($date)
    {
        if ($checkDate = $this->checkDate($date)) {
            $xml = $this->getXml($checkDate);

            if ($xml->count() == 0) {
                return response('Not Found', 404);
            }

            return json_encode($xml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        return response('Invalid data: ' . $date, 422);
    }


    private function checkDate(string $date, string $format = 'd-m-Y'): ?string
    {
        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) === $date ? $d->format('d/m/Y') : null;
    }

    private function getXml(string $date): SimpleXMLElement
    {
        $client = new Client();

        try {
            $data = $client->get(sprintf(self::QUOTES_XML_URL, $date));
        } catch (GuzzleException $e) {
            Log::error($e);
        }

        return simplexml_load_string($data->getBody()->getContents());
    }
}
