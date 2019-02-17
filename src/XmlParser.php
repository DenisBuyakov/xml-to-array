<?php
namespace xmlToArray;
class XmlParser extends BaseXmlParserViaXmlReader
{

	protected function xmlReaderToAssoc(\XMLReader $xml) {
		$tree = null;
		while ($xml->read()) {
			if ($xml->nodeType == \XMLReader::END_ELEMENT) {
				return $tree;
			} else if ($xml->nodeType == \XMLReader::ELEMENT) {
				if ((!$xml->isEmptyElement)) {
					$children = $this->xmlReaderToAssoc($xml);
					if (is_array($children) and count($children) > 1) {
						if (isset($tree[$xml->localName])) {
							if (!isset($tree[$xml->localName][0])) {
								$moved = $tree[$xml->localName];
								unset($tree[$xml->localName]);
								$tree[$xml->localName][0] = $moved;
							}
							$tree[$xml->localName][] = $children;
						} else {
							$tree[$xml->localName] = $children;
						}
					} else {
						$tree[$xml->localName] = $children;
					}
				}
			} else if ($xml->nodeType == \XMLReader::TEXT) {
				$tree = $xml->value;
			}
		}
		return $tree;
	}

}