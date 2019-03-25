<?php
namespace xml\xmlToArray;
/**
 * Class XmlParser
 * @package xml\xmlToArray
 */
class XmlParser extends BaseXmlParserViaXmlReader
{
	/**
	 * @param \XMLReader $xml
	 * @return mixed|null|string
	 */
	protected function xmlReaderToAssoc(\XMLReader $xml)
	{
		$tree = null;
		while ($xml->read()) {

			//если нода закончилась врзавращает что насобирали
			if ($xml->nodeType == \XMLReader::END_ELEMENT) {
				return $tree;
				//если в ноде есть вложения то
			}
			else if ($xml->nodeType == \XMLReader::ELEMENT) {

				if ((!$xml->isEmptyElement)) {
//					$name = $xml->localName;
					//получим деток
					$children = $this->xmlReaderToAssoc($xml);


					if (is_array($children) and count($children) > 1) {


						if (isset($tree[$xml->localName])) {
							if (!isset($tree[$xml->localName][0])) {
								$moved = $tree[$xml->localName];
								unset($tree[$xml->localName]);
								$tree[$xml->localName][0] = $moved;
							}
							$tree[$xml->localName][] = $children;
						}
						else {
							$tree[$xml->localName] = $children;
						}


					}
					else {
						if (!isset($tree[$xml->localName])) {
							$tree[$xml->localName] = $children;
						}
						else if (is_array($tree[$xml->localName])){
							$tree[$xml->localName][] = $children;
						} else{
							$tree[$xml->localName] = [$tree[$xml->localName],$children];
						}

					}


					//если в ноде есть вложения то
				}

				//если в ноде текст возвращает его
			}
			else if ($xml->nodeType == \XMLReader::TEXT) {
				$tree = $xml->value;
			}
		}
		return $tree;
	}

}