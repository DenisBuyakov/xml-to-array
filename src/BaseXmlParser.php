<?php

namespace xml;
/**
 * Class BaseXmlParser
 */
abstract class BaseXmlParser
{
	abstract public function xmlFileToAssociativeArray(string $fileName): array;
}