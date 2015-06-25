<?php
//header("Content-type: text/xml ");
//header('Content-Disposition: attachment; filename="xml.xml"');

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cursos>
</cursos>
XML;

$cursos = new SimpleXMLElement($xml);	

$curso = $cursos->addChild("curso");
$curso->addAttribute("type","ead");
$curso->addChild("nome","PHP ORIENTADO A OBJETOS");
$curso->addChild("codigo","501");
$professores = $curso->addChild("Professores");
$professor = $professores->addChild("Professor");
$professor->addChild("nome","Gabriel");

$curso = $cursos->addChild("curso");
$curso->addAttribute("type","ead");
$curso->addChild("nome","DESENVOLVIMENTO ENTERPRISE COM PHP");
$curso->addChild("codigo","502");
$professores = $curso->addChild("Professores");
$professor = $professores->addChild("Professor");
$professor->addChild("nome","Gabriel");

echo $cursos->asXML();

