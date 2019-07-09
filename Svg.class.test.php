<?php
define('STYLE0', 'fill:none;stroke:black;stroke-width:1;');
define('STYLE100', 'fill:red;stroke:black;stroke-width:1;'); //STYLErgb

class Svg extends XMLWriter {
public $viewBox = '0 0 500 500', $id;
public $href='http://example.com', $target;
public $cx, $cy, $r, $x1, $y1, $x2, $y2;
public $x, $y, $width, $height, $rx, $ry;
public $style;

public function startSvg($viewBox) {
	$this->startElement('svg');
	$this->writeAttribute('viewBox', $this->viewBox);
	}
public function endSvg() {
	$this->endElement();
	} 
public function startA($href, $target) {
	$this->startElement('a');
	$this->writeAttribute('href', $this->href);
	$this->writeAttribute('target', $this->target);
	} 
public function endA() {
	$this->endElement();
	}
public function drawCircle($id, $cx=100, $cy=100, $r=25, $style=STYLE0) {
	$this->startElement('circle');
    $this->writeAttribute('id', $id);
	$this->writeAttribute('cx', $cx);
	$this->writeAttribute('cy', $cy);
	$this->writeAttribute('r', $r);
	$this->writeAttribute('style', $style);
	$this->endElement(); // circle
    $perimeter=2*$r*M_PI;
    $area=M_PI*$r*$r;
    return array($id,$cx,$cy,$r,$perimeter,$area);
	}
public function startClipPath($href, $target) {
	$this->startElement('clipPath');
	$this->writeAttribute('id', $id);
    return $id;
	} 
public function endClipPath() {
	$this->endElement();
	}
public function startDefs($id='id01', $target='_blank') {
	$this->startElement('defs');
	$this->writeAttribute('id', $id);
    return $id;
	} 
public function endDefs() {
	$this->endElement();
	}  
public function startDesc($id='desc01') {
	$this->startElement('desc');
	$this->writeAttribute('id', $id);
	} 
public function endDesc() {
	$this->endElement();
	}  
public function writeDesc($id='desc01', $content='content text') {
	$this->startElement('desc');
	$this->writeAttribute('id', $id);
    $this->text($content);
    $this->endElement();
    return array($id,$content);
	} 
public function drawEllipse($cx=100, $cy=100, $rx=50, $ry=25, $style=STYLE100) {
	$this->startElement('ellipse');
	$this->writeAttribute('cx', $cx);
	$this->writeAttribute('cy', $cy);
	$this->writeAttribute('rx', $rx);
    $this->writeAttribute('ry', $ry);
	$this->writeAttribute('style', $style);
	$this->endElement(); // ellipse
    return array($cx,$cy,$rx,$ry);
	}
public function startG($id='g01', $style='') {
	$this->startElement('g');
	$this->writeAttribute('id', $id);
    $this->writeAttribute('style', $style);
    return $id;
	} 
public function endG() {
	$this->endElement();
	}  

public function drawImage($x=200, $y=200, $width=100, $height=100, 
$xlink='https://mdn.mozillademos.org/files/6457/mdn_logo_only_color.png') {
	$this->startElement('image');
	$this->writeAttribute('x', $x);
	$this->writeAttribute('y', $y);
	$this->writeAttribute('width', $width);
    $this->writeAttribute('height', $height);
    $this->writeAttribute('xlink:href', $xlink);
	//$this->writeAttribute('style', $style);
	$this->endElement(); // image
	}
public function drawLine($x1=10, $y1=10, $x2=100, $y2=100, $style=STYLE0) {
	$this->startElement('line');
	$this->writeAttribute('x1', $x1);
	$this->writeAttribute('y1', $y1);
	$this->writeAttribute('x2', $x2);
    $this->writeAttribute('y2', $y2);
	$this->writeAttribute('style', $style);
	$this->endElement(); // line
    return array($x1,$y1,$x2,$y2);
	}
public function drawPath($id='path01', $d='M10,10 H50', $style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
	$this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	} 
    
// class Arc($mx,$my,$r,$xar,$laflag,$sflag,$x,$y,$style)
//public $mx, $my, $r, $xar, $laflag, $sflag, $x, $y, $style;
//echo "<path d='M$mx $my A$r $r $xar $laflag $sflag $x $y' style='$style' />";
public function drawPathArc($mx=100, $my=100, $r=30, $xar=0, $laflag=0, $sflag=0,
$x=120, $y=150, $style=STYLE0) {
//M10 315 A30 30 0 0 1 162.55 162.45
	$this->startElement('path');
	$this->writeAttribute('id', $id);
    $d='M'.$mx.' '.$my.' A'.$r.' '.$r.' '.$xar.' '.$laflag.' '.$sflag.' '.$x.' '.$y;
	$this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	} 
    
//echo "<path d='M$mx $my A$r $r 0 0 1 $x $y' style='$style' />";  
function drawPathArcCw($mx=100, $my=100, $r=30,
$x=120, $y=150, $style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
	$d='M'.$mx.' '.$my.' A'.$r.' '.$r.' 0 0 1 '.$x.' '.$y;
    $this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	}
    
//echo "<path d='M$mx $my A$r $r 0 0 0 $x $y' style='$style' />";   
function drawPathArcCcw($mx=100, $my=100, $r=30,
$x=120, $y=150, $style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
	$d='M'.$mx.' '.$my.' A'.$r.' '.$r.' 0 0 0 '.$x.' '.$y;
    $this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	}

//echo "<path d='M$mx $my C$x1 $y1, $x2 $y2, $x $y' style='$style' />";
public function drawPathC($id, $mx=100, $my=100, $x1=120, $y1=80, $x2=180, $y2=80, 
$x=200, $y=100, $style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
    $d='M'.$mx.' '.$my.' C'.$x1.' '.$y1.', '.$x2.' '.$y2.', '.$x.' '.$y;
	$this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	}   

//echo "<path d='M$mx $my C$cx1 $cy1, $cx2 $cy2, $cx $cy S$sx2 $sy2, $sx $sy' style='$style' />";
public function drawPathCS($id, $mx=50, $my=50, $cx1=60, $cy1=30, $cx2=80, $cy2=30, $cx=150, $cy=50, 
$sx2=220, $sy2=120, $sx=250, $sy=50, $style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
    $d='M'.$mx.' '.$my.' C'.$cx1.' '.$cy1.', '.$cx2.' '.$cy2.', '.$cx.' '.$cy.' S'.$sx2.' '.
    $sy2.', '.$sx.' '.$sy;
	$this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	} 
    
//echo "<path d='M$mx $my Q$x1 $y1, $x $y' style='$style' />";
public function drawPathQ($mx=100, $my=100, $x1=150, $y1=80, $x=200, $y=100, 
$style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
    $d='M'.$mx.' '.$my.' Q'.$x1.' '.$y1.', '.$x.' '.$y;
	$this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	}   

//echo "<path d='M$mx $my Q$qx1 $qy1 $qx $qy T$tx $ty' style='$style' />";    
public function drawPathQT($mx=100, $my=100, $qx1=150, $qy1=180, $qx=200, $qy=100, 
$tx=300, $ty=100,
$style=STYLE0) {
	$this->startElement('path');
	$this->writeAttribute('id', $id);
    $d='M'.$mx.' '.$my.' Q'.$qx1.' '.$qy1.', '.$qx.' '.$qy.', T'.$tx.' '.$ty;
	$this->writeAttribute('d', $d);
	$this->writeAttribute('style', $style);
	$this->endElement(); // path
    return array($id,$d);
	}   

public function startPattern($id='patt01', $style='') {
	$this->startElement('pattern');
	$this->writeAttribute('id', $id);
    $this->writeAttribute('style', $style);
    return $id;
	} 
public function endPattern() {
	$this->endElement();
	}  
public function drawPolygon($id='plgn01', $points='100,100 150,25 150,75 200,0', 
$style=STYLE0) {
	$this->startElement('polygon');
	$this->writeAttribute('id', $id);
	$this->writeAttribute('points', $points);
	$this->writeAttribute('style', $style);
	$this->endElement(); // polygon
    return array($id,$points);
	}   
public function drawPolyline($id='pln01', $points='100,100 150,25 150,75 200,0', 
$style=STYLE0) {
	$this->startElement('polyline');
	$this->writeAttribute('id', $id);
	$this->writeAttribute('points', $points);
	$this->writeAttribute('style', $style);
	$this->endElement(); // polyline
    return array($id,$points);
	}   
public function drawRect($x=100, $y=100, $width=100, $height=50, 
$rx=0, $ry=0, $style=STYLE0) {
	$this->startElement('rect');
	$this->writeAttribute('x', $x);
	$this->writeAttribute('y', $y);
	$this->writeAttribute('width', $width);
    $this->writeAttribute('height', $height);
    $this->writeAttribute('rx', $rx);
	$this->writeAttribute('ry', $ry);
	$this->writeAttribute('style', $style);
	$this->endElement(); // rect
    return array($x,$y,$width,$height,$rx,$ry);
	}
public function startScript($type='text/javascript') {
	$this->startElement('script');
	$this->writeAttribute('type', $type);
	} 
public function endScript() {
	$this->endElement();
	}  
public function startStyle($id='sty01') {
	$this->startElement('style');
	$this->writeAttribute('id', $id);
    return $id;
	} 
public function endStyle() {
	$this->endElement();
	}  
public function startSwitch() {
	$this->startElement('switch');
	} 
public function endSwitches() {
	$this->endElement();
	} 
public function startSymbol($id='sym01') {
	$this->startElement('symbol');
	$this->writeAttribute('id', $id);
    return $id;
	} 
public function endSymbol() {
	$this->endElement();
	} 
public function startText() {
	$this->startElement('text');
	} 
public function endText() {
	$this->endElement();
	}  
public function drawText($id='text01', $x=50, $y=50, $dx=0, $dy=0, 
$content='text', $style=STYLE0) {
	$this->startElement('text');
    $this->writeAttribute('id', $id);
	$this->writeAttribute('x', $x);
	$this->writeAttribute('y', $y);
	$this->writeAttribute('dx', $dx);
    $this->writeAttribute('dy', $dy);
	$this->writeAttribute('style', $style);
    $this->text($content);
	$this->endElement(); // text
    return array($id,$x,$y,$dx,$dy,$content,$style);
	}  
    
//Always include into <text>...</text> tags.
public function drawTextPath($href='#path01', $content='text on path', $style=STYLE0) {
	$this->startElement('textPath');
    $this->writeAttribute('href', $href);
	$this->writeAttribute('dx', $dx);
    $this->writeAttribute('dy', $dy);
	$this->writeAttribute('style', $style);
    $this->text($content);
	$this->endElement(); // textPath
    return array($href,$content,$style);
	}  
    
    
public function drawUse($x=100, $y=100, $width=100, $height=50, 
$href='#sym01', $style=STYLE0) {
	$this->startElement('use');
	$this->writeAttribute('x', $x);
	$this->writeAttribute('y', $y);
	$this->writeAttribute('width', $width);
    $this->writeAttribute('height', $height);
    $this->writeAttribute('href', $href);
	$this->writeAttribute('style', $style);
	$this->endElement(); // use
    return array($x,$y,$width,$height,$href);
	}
} // =============END OF CLASS Svg===================
 
  
$xw = new Svg();
$xw->openURI('Svg.class.svg');
$xw->startDocument('1.0','UTF-8');
$xw->setIndent(4);
$xw->startSvg();
$xw->startSymbol();
$xw->drawCircle('',20,20,5,'STYLE100');
$xw->endSymbol();
$xw->drawUse(100,100,100,50,'#sym01',STYLE100.'opacity:1.0');
$xw->drawUse(120,100,100,50,'#sym01',STYLE100.'opacity:0.8');
$xw->drawUse(140,100,100,50,'#sym01',STYLE100.'opacity:0.6');
$xw->drawUse(160,100,100,50,'#sym01',STYLE100.'opacity:0.4');

$xw->startG('rect01');
$xw->drawRect(50,50,30,30,5,5,STYLE100);
$xw->endG();
$xw->drawPath('path01',"M10,90 Q90,90 90,45 Q90,10 50,10 Q10,10 10,40 Q10,70 45,70 Q70,70 75,50");
$a=$xw->drawPathArcCcw();
$xw->startText(); 
$xw->drawTextPath();
$xw->endText(); 
$xw->endSvg(); // svg
$xw->endDocument();
$xw->flush();
readfile("Svg.class.svg");

echo "<hr>";
print_r($a);
?>

