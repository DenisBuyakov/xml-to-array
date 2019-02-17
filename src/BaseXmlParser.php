<?php

namespace xmlToArray;
/**
 * Class BaseXmlParser
 */
abstract class BaseXmlParser
{
	abstract public function xmlFileToAssociativeArray(string $fileName): array;
}