<?php

class XmlProcessor
{
    /**
     * XML Writer
     *
     * @param XMLWriter $xml
     * @param array $data
     */
    private function write(XMLWriter $xml, $data)
    {
        foreach($data as $key => $value){
            if(is_array($value)){
                $xml->startElement($key);
                $this -> write($xml, $value);
                $xml -> endElement();
                continue;
            }
            $xml -> writeElement($key, $value);
        }
    }

    /**
     * Convert associative array to XML Dom
     *
     * @param array $arrayData
     * @return xml dom
     */
    public function arrayToXml($arrayData)
    {
        $xml = new XmlWriter();
        $xml -> openMemory();
        //$xml -> startDocument('1.0', 'UTF-8');
        $xml -> startElement('root');

        $this -> write($xml, $arrayData);

        $xml->endElement();

        return $xml->outputMemory(true);
    }

}