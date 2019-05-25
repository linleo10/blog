<?php
class Api_Getwords extends Tool
{
	public function respond()
	{
		$data="现实很饿，会吃掉理想|一个人至少拥有一个梦想，有一个理由去坚强。心若没有栖息的地方，到哪里都是在流浪。|没有任何的未来，值得牺牲你的现在。|花开花落，随缘自在。|不要抱怨，一切都是最好的安排。|理论是灰色的，现实之树长青。|不管前方的路有多苦，只要走的方向正确，不管多么崎岖不平，都比站在原地更接近幸福。|我不知道离别的滋味是这样凄凉，我不知道说声再见要这么坚强。|我不知道离别的滋味是这样凄凉，我不知道说声再见要这么坚强。|我不知道将去何方，但我已在路上。|人永远不知道，谁哪次不经意的跟你说了再见之后，就真的不会再见了。|不管你曾经被伤害得有多深，总会有一个人的出现，让你原谅之前生活对你所有的刁难。|已经走到尽头的东西，重生也不过是再一次的消亡。就像所有的开始，其实都只是一个写好了的结局。|生命可以随心所欲，但不能随波逐流。|人们常常会欺骗你，是为了让你明白，有时候，你唯一应该相信的人就是你自己。|生活坏到一定程度就会好起来，因为它无法更坏。|努力过后，才知道许多事情，坚持坚持，就过来了。|到不了的地方都叫做远方，回不去的世界都叫做家乡，我一直向往的却是比远方更远的地方。|迷茫时，坚定地对自己说，当时的梦想，我还记得。|有些烦恼，丢掉了，才有云淡风轻的机会。|我们的孤独就像天空中漂浮的城市，仿佛是一个秘密，却无从述说。|越是试着忘记，越是记得深刻。|如果把童年再放映一遍，我们一定会先大笑，然后放声痛哭，最后挂着泪，微笑着睡去。|分别不是终点，彼此铭记就已足够，人生的有些时候，一场邂逅，其实就足够美丽。|无谓孤单。因为这世上，肯定有一个人，正在努力地走向你。|坚强不是面对悲伤不流一滴泪，而是擦干眼泪后微笑面对以后的生活。|在时代的洪流之中,梦想会被压弯,苦恼无济于事,生存却仍需继续,这样的宿命也是我们现在每一个人的宿命。|不要对外表过分在意，心灵才是最重要的。|没有什么会比幸福的回忆更会阻碍人们幸福。|梦想不会逃跑，会逃跑的只有我们自己。|梦想不会逃跑，会逃跑的只有自己。|一条看上去很远的路,说不定就是最近的路。|人的一生就那么长，没有那么多的时间去悲伤。|春天之所以美好，富饶 ，是因为它经过了最后的料峭。";


/*************************************************************************/
/*
* string format : 输出格式(text/json/js)
* string charset : 输出编码 (utf-8/gb2312)
*/
header("Pragma:no-cache");  
header("Cache-Control:no-cache,must-revalidate");
$charset = $_GET['charset'];
if ($charset != 'utf-8' && $charset != 'gb2312') {
exit('参数错误');
}
$format = $_GET['format'];
$poems = explode("|",$data);
$id = array_rand($poems,1);
if($format == 'json') {
	header('Content-type: application/json;charset='.$charset);
/*
* JSON
*/
echo json_encode(array(
'text'=>$poems[$id]
));

}elseif($format=='js'){
/*
* JS
*/
	header('Content-type: text/javascript;charset='.$charset); 
	echo 'function text(){os = document.getElementById("one_sentence");os.innerHTML = "'.$poems[$id].'";}';
}elseif($format == 'text'){
/*
* TEXT
*/
echo $poems[$id];
}else{
	echo "参数错误";
}
	}
}