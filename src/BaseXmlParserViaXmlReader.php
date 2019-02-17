<?php

namespace xml\xmlToArray;

/**
 * Class BaseXmlParserViaXmlReader
 * @package xml\xmlToArray
 */
abstract class BaseXmlParserViaXmlReader extends BaseXmlParser
{
	/**
	 * @param string $fileName
	 * @return array
	 */
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

	/**
	 * @param \XMLReader $xml
	 * @return mixed
	 */
	abstract protected function xmlReaderToAssoc(\XMLReader $xml);
}