<?php

namespace xml\xmlToArray;

/**
 * Class BaseXmlParser
 * @package xml\xmlToArray
 */
abstract class BaseXmlParser
{
	/**
	 * @param string $fileName
	 * @return array
	 */
	abstract public function xmlFileToAssociativeArray(string $fileName): array;
}