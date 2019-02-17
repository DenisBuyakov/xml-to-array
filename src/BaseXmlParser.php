<?php

namespace xml\xmlToArray;
/**
 * Class BaseXmlParser
 */
abstract class BaseXmlParser
{
	abstract public function xmlFileToAssociativeArray(string $fileName): array;
}