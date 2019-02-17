<?php

namespace xml\xmlToArray;
/**
 * Class BaseXmlParser
 */
abstract class BaseXmlParserViaXmlReader extends BaseXmlParser
{
	public function xmlFileToAssociativeArray(string $fileName): array
	{
		$xml = new \XMLReader;
		$xml->open($fileName);
		$arr = $this->xmlReaderToAssoc($xml);
		if (is_array($arr))
			return $arr;
		else
			return [];
	}

	abstract protected function xmlReaderToAssoc(\XMLReader $xml);
}