<?php
namespace Edu\Cnm\KiteCrypt\Test;

use Edu\Cnm\KiteCrypt\{Profile};

// grab the project test parameters
require_once("KiteCryptTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/class/autoloader.php");

/**
 * Full PHPUnit test for the Profile class
 *
 * This is a complete PHPUnit test of the Profile class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Profile
 * @author Jon Sheafe <jsheafe@cnm.edu>
 **/

/**
 * Profile Class creation
 *
 * @author Jon Sheafe <jsheafe@cnm.com>
 * @version 1.0.0
 **/
class ProfileTest extends KiteCryptTest {

	/**
	 * id for profile; this is the primary key
	 * @var int|null $profileId
	 **/
	protected $validProfileId = null;

	/**
	 * User Name for profile;
	 * @var string
	 **/
	protected $validProfileUserName = "John Doe Sr";
	protected $validProfileUserName2 = "Matt of RR";

	/**
	 * Invalid User Name for profile;
	 * @var string
	 * @var string <= 256 characters length
	 **/
	protected $invalidProfileUserName = "PHPUnit test pass if this test fails";

	/**
	 * Public Key X for encryption for profile
	 *
	 * @var string > 256
	 **/
	protected $validProfilePublicKeyX = "dkongdakjoidgneislidkei";

	/**
	 * Public Key X 2 for encryption for profile unique from $validProfilePublicKeyX
	 *
	 * @var string > 256
	 **/
	protected $validProfilePublicKeyX2 = "kdjfoidionvfhosdfhoajd";

	/**
	 * Invalid profile Public Key X;
	 * @var string
	 * @var string > 256 characters length
	 **/
	protected $invalidProfilePublicKeyX = "414503041563250455783049680985321106644097841565413259999055043722995610115825938834269695021696671452671066056800152066678319405264047598488359412889880570693800265622129583580578235993364475574042900620446529837585653017295206809376791556212908692803584681263593683027857676926887329644058280412630518137321940017214917490268999125886088716465791194536557155873203505627304176418775041137409174521408341712434003597215277799124766495097389683738041683114710358030065407083294421538935738322844715157820970193549644257852887248766980088055782008258044616368069434000367782818995789388754205925762541810096167301582187006912273678787213757793678960281327130197562416410448343197628103843474404131729449676794473759971884448075738830786880825897912755025569330120568052184019470353871534733525317113373670998319464920624902064979253557429236186796861398932806212485242203128666763044260563513248546765313974995831714073345066427667205620985785007125417935743136001735007011840671064588286000240155440744050818309042027955093261804421526369412451985202513129857543186037153775781228042922734384809215835597649843533679874166836845142108661111720390316659106919656912742035171442133623060180911883570949015358869142297564611898699054177418169115748688522698673646400461504037414911065178162034275799614751827004012580736579910396020807311319967116622958224716913869564167676946660994485138029443276682389446276807993509102186843382271135195498504553804436160042267421128977479797980393495887559798628935613587223192244088965860472439023731471299271492952230635678361377598306229788211846655200853551711175445483132103602736230002630475483067775659450420782757268855441677325279798868813482753142404240755102540551702393886418812671524302351697473396680756994805300613511356853013080356388801021154220415880416336025753426111675683931350420947273600048894365327161427654068020885023350162705487608189982449909813032510572951373084977986740906371945796235368963712555148154194295599919086726810677131703676685449800202382931911054499016017344671916013791053678719265026532910926788608548366258678368844846605437083701839065265992789180620569097564622736765454881533536480333921565323733367565328602240843829784836160880307287889497259777530659804429350973559604803789085852800737887834253554817753005316004194738892762250512564478312082952032092889340542055606419219206902549450589633951006356307749102372563013242155849508863451495604360159456568400763904780883850995857069460334575819195329453094321357060442659985066673388851196982064534477094584673285706120291716016630856046089377472872445982996290651208056135633892925013168759827516264599777184571743844839760572783626731163807461346389914973641293407704151445927742673274301427337333340505508126515807422890476165010513613299221926770513931023566975186187799243968710418558301963588903917025500085487313723160558017058867132331176679092353065587060317160276631716148437929072724179313084724645840941332097969764205128015298528369132579644633586467783911146022760273033513909328963029481989505565575877062423662958095714713068493591175777337232631216570241534902887070817145424549969211269187243019348412852528373198205977760338692113738094188966016866809648842988188796771274132615970290875791520011056633742792571430771617657861405877086145182358598965288271986224760988366117423610641749138488245433850984463812570848775778173355971995177000919065454775495801358468203933408663835854613024613741885515995990235323188744408140121015592488636567827408246934757920920814533243497310827051221636181456451974221798721526672607011865571388564068615583004394596211081710137307435881551994838603238274871937952491896713782993737435116238080658348865848672363519505110679699399856806592940911061671914550106171269359155566042143581934603781327034079663505924941997365552938910131147466064520855621382833816363762825375422540645872504254796556129359350449302889434444743588195366047345849224600257817364784763665370207847503830732345755297488937900125647265678560626108281696040405572864481585003934000521116380580464352902365789238606657596099938795936317943067548425231628539141280279644765107146406488896539229377393064345613141211224923705642325421312354873098795591708901034620910877801197439024340730088023341806989976614805364054469625424819337538975712834403294442971923620045180012528624252496901587756469813766270099164465497631772435067581134970052241321510355377831790996410914098188059754781390706637085353859611495984229619127927022519810871051372950863500165831833656444333194836771141422053129512974818846684670600218838350743966830956909919507259670786900225118227197863908579148333130980347330829322765214217013231451910190959331119453942822152692572101058055331236398580162139974512324243527207672686764008977517133169602773356404552384422229372839539689666514830794121492660524914085528859243521183491631086943495166225883372622495727519839142801715970089947498596581607183282683940849492204879447880786067340720735644355429538027462503038293739306946094666787060285017849751910098865794365394017421084216620195341585900467043447456292515161526213812302049829805698566408459382529892198841900326092632225958604454746373264824036087350192690074625635222488472876156918854844580218278840394122244007370306865589850686354575196076584224648995525640055743390414336202483364994610278722710908480651675171060411600482547921764965957504345345414247900782045665171616379628385626173110480852905003003668199043179945809511322723398834067186546659351831655260318824457858535970559033534613782330333613055950798162399042183477343783632103943099820448025885262903554302036841449183313192913013969682675122611854628906555945833008598632415520219844097617869654308221467548561132179461253632682189947193503392445990229564375913368322844303586696951719065027200143699113424201708185406550956802496712404329377197391904234192050160427493888163946863636181417966408206779116082191110501587052192130146202250144081472448805223404000730736557907339082803101681104234987834506377219825771764413177890044551846214654334536805304495016922480604415790814455436200032431222025730519425933532081214774344874178590981449273296322095885062003363001078038583291757735391173105203303249906764290664959226796971120988701890932505950434797841287706394644593326443334663564777797226350721061918355347405142846003927213558741125852210882264269135111475897418932963858239866577332131561065911307487495087399827536634033921208425788753093686292813130496745788315408129289029533278570460318737882369443333187553737321181889361768146909387989470812200642685977006962458776956380184332144537751438654477713082069707249565812371728500162376909070630652216847202951214416257896803969748988208664414066094861261645357364030476241180676785731547167002520764521203941850937031300955732934909520529140704057668907452310071520780714587892185312334002403792720954910944565101063735974202272837371825296308710001600806021404146880404971051239376320254822434939820761467808885516382472337417100380230066855280873825955568886068134420799300613662445728823761315768366719277076540078266911292865255079578061012758464900690426557823318482971227126919961630993607039698946520562010798440958344789712406831273908929553303520301266927394319831253484075578608465739333140392365397412431853140994096029737267009996864856971618029195869164893194422320056713407967871983135950167490712122870506841702514586303218172588214164698312805275935429018655750450882910050697606683325368118273758738030990791786151989409239258254466419997858058934085981777505240187281567699474862103751742058332913923500052695815912792527570362335788397006111126855112565160665620627125009357228992586737906946248455046917121396074563468399087170529275105967891486874737386897734576520447261525687610389955997940956952511255210611081630384052532929120118332389697113034333624388622262719718139327288342445069240517466258634701861037276526725777153720777784892724270408626936483822156276166817744501841857606422138226913939454725180898971819530188901320912871355680624706994701096676537392350971891692769874403893609113394019125179107414168237005582639177481749989667542827910065170746721810111296792568077930564588074219223573859334882510793781027677335243776477951310717638433176706026478565984544887526472096804735752747118772473979452434169161191907716444154934788397011050354327871608439395764170468880216527616677053587558455071746579591505492549165808732170386484545707129840998414466134626244069673080454953029136661538953484886780883397670872068965512674775468585919611861015769067942008727328677543228580277262684734704464096993589294783547393365069417621301616224611803970113542599585744899052712121769988770996973494666021630960430468869302476976213052380760978073397622702316065673316659630005159251810574756430415761676749846257581520998463416632311440234798356586620392572120668144931715204480242988765995186909889063810630055538496698014584473530768742871403926420705672178919050393400744402087124902276453779746409342231030379059198743554037758258226439290569878860392380967947792157230187002788899869742516352153139199157210801234337527516212414010558133893695777780348702551694548147177573222866003253708592675172172817737404936743550789499015730484515251066313825925323949170690856968100866626551568505033413604629038895215974647195825830930617876627950701317507955626042548834914977576733697058449182879627639016987535957168870866535188058180530829209886117212813341080636641840628862092123979938460746804309899400896061570882277533101840501783958322183461216023379494593370591329535899925847917599872058265051181715487566126388496956710694940991039531086236811236716859617737987272653226403318627819486043949245350660958830641947381307546490366836214213586900952424408470862411609983719328351644055079511542588437472984016781010231501554291502105680659482693093507432968989354283165782173427569571698933787691269482811143315831813121670787783113847716488078855129795281246827299224122305190540623682980971077945525565365943242414394753360532079957456987458443026838106757438420490397829277789682440465455940453386798143285143132049354806124939247007239366848797524990574182304565456514713758036151995811142584296228581470578214602514857911005274593295310846175463611249244009005961718115968816269319522537301880291914829307026270009736702192941472728911831503534555528120037899314307479290892804755939244040732456668006264217007238642897452576353097685586653288901094122913556571865381984337336061713804872660647200690279839961463236992563641909713505814423532370982163197002611340220287601661205443461124032135150277713414426748724699211646962010985976432404260346324915673247000152733341356227978156414160452116555138568385744032326837583936750074828736959374874191921923547452031061332369836285831110499250140839325688332776844618846036042079239260099402919356759521399817547273130194492793377806623404103193342262551072134259699586374305164346875034975929637242718440909075148679785941777082292904352621078420345910550332284512395506212528762951846589923757588342036820340809633753866674565323680300371582311954515639605663704341240656668397720858094628304077299048370692970089702661247891829071521276427769219867288898327729173395297076253498398416235371338566372817517406950772476735068722394778177016642355076245165967577392275595498397402070803213803361464886756360564486839648680064846050705760889248480591910980554188403501280581973043169015145797681546323851482312347701886187609011558257766835967418921173855111035071446101338055302222439247103470729426483304557959109085113001918604587333204076714793329487487795725174275039648260392896107757258676451610973435451904827883188510625628632212436823983074845091203558375519393401079730433928895225053307327549578825534106499719183158492827743421975141610582736320922502562694899853203744260658240861153737431601682952712020188164666835775640151135180623439871903420302130695652439246264002969883269729080063705063827010757214972612279509379718878118448703071481884943217577220658975665975045811732378009300648270474241557057919712143523429313250512917819092143872937971464590331197678153467584846327580437675499989002849590521725922048495230447171634567371085801355426525455865520474799769235227474213495201216918036492362359542938236264906801503647418744101314285117297634909156596380560447992746853169600252732115078419546911780015686990868843698229906608036716086569044313119362690232275266828910183405536033600653876949969349700882837799277947559938954696978189075583827138090965097774557676562817842621219490329136796610236462185985844122306782199429613950058835370822883430458576412257433619325782652816483411826486032923134177941639427814005145041124214358242542745471210424285059602438913975160573646738402009769347430943025341965089149142824195487848723809994113468033146310022158585664371559461341007384556235176931300961295878002066979142463232461382542231624187153478329327776103648348396395015831623113232768795839866386576425220596190669207775477741661916150983644033403257495093099482527732644531916754211336099111187186506121757305997723926206693552465253390461100094184709585803064887492363508665406738837863534659597604672117185650696443485407970388301176142012381472617345695649863909297725119182586085261531862492925167828026706960303350950872286574712244039809455789689819762498608637387951985511601625674934263805999436079798042386713714618064249808288405347915138301130305231435859834863400073445185568646507109794887482397642235005749138457128610224580748101297449137477987593332058493919090366657226351373662470062115082969002804565999218067169307152586555209339616163004649718620873602991913306656174304387235954374260135507597459444936904409102838590484325566882211102941103073139903359781602814437740260363381167356749194820707017059900096268695811079926395870149704610011165533063050682056123556159580559864264841894363565409683813062110531874663866133554160100397984750467184046625124768939489638364915625759749794486032373830773341270678737045468436274870585015913825052014799392309541206745647182325050143159646708864088020919383875756409847639705332497939353063704646510608064097531588043600280174636664122746694623847386807329472520804501990522560910403464666112782020922477405550044209693910005923381523335527460341094148014966831491304037966325479646179214158252620930531739686373914825495414348070995671700261567016927463610409900443105876904653931764779666704953788052840292214987884455428629068786266773428969035695129467861682399134842064214509245831500833410422784886555021249256050055619059665770593426168200992237224363780446593361552647050699382629921867869184609707393005354968823707468787838081679326118420650224321649030704144890522237553616125759096111750349621626100771250310511552723596909497307283780253154590525250017838844916261681858903195605693110058893794996882449451924091845832604230936519590442864164451965710939172191169064641049199514376477438720667555958366342716094206084332143224305844263769205432403281861176981585724650718813866227826015272966409108652089499273881200015018892753135447436693854901543690925857605699693168369007963906524309415950038867945232966043883283523403280565876396452540461919123271452067394951236981629304325230349058929939163977783223080777906819160585618278896979626414504322071758478974671363246811457358256448907508215278959072705303754410183330304680242327693680874975044083338459274877743401885028268813449753019674166533334306822582667052672708840555259272575344014490586936773980412675956493073888716150747438252903437398815534881120235393398785790805807902387236818906697903615597276699099793358094737486703584182552836229920558850870409114121844936978030914975374872158041487379714732079628373368094060908305148196166781551198997270370649367992028883057918443036774874635784868728445610539467196680108222739663077112220937383119392922611468814543565816772124474577324149227513230065205594326737993122936619967424516022002280760213786178992170544236182664679120484552578529395520946036851842941132304000372728491611931538956661405502051326985905251511163150766390905055059946652977209124044787292838770576224031958241344436756108149789491465305429433237894351157306739624437157991308649190810206078716802003352333473738835920772729447822253792177608457702083143374735386694481219706853739554534670944072650622566970379494065960949045007446622449711696842684048910980512675822227976222546473026930917524205851086037938294656259049516818161137924435981553681583112812023847055525782137695034932297007825859838873137469898274081023212839488436339464868771621544831069322665291236996291399896654502308508467307402158036802521794065285175637693803034318614129391586715684913883292408356431203716893295320760084927854086311912634488104460808866698715443398583402680067854514450395692255174482783281766167340979286094936460902855532031941276109371725278958412916914184825410759526750773030792510944922543513709851038740573459531258887406874992126495398718557148957248871975455373900213616833396822442393570740751412962315821468482542865306121946911895802935490011193207333150686764342933776157270608108806306358623739899313058692741684712692200822357094556929884005970097866155668440792330250497292042613493645983743029900503395526272358983414291816695787005374851395464118499080239129681090190579444269324710721203587687106337425256786362014356021219040851823329146913776090065594398895324540701095616644890261723534762844944179477890468913249740082822591405727276601200753160338592305901652515136102036067402964067854744032663655259846231816993562942295423949529953594201203980534297820685369775564482301851886954044800862967274324540804971005847790236008221133612837226348538684666616184077519656854482427447701278522025789599126971694956902049744557168934996176374053770646904847912966990752786803553720244007259533923285395759147960400425095498829204743252214361954687425715142589290298614736511263380145879729582010408943961236609344286881703326990742320191667318143217248745823770216846736515663864595073120311688598029892393934919452973687511732496004762857402493876958211643923345142179512694490681896786750510784695337259750411097812607940725104370491993482645226091713953342403863311852865606944811205652859848662749009371307359035299645420204517896418235983005059975437861492055404856516998021335445232372750889300765349565221193028246450184393704178167098834734594150999731224182326486933574464413025845459528647411507482688401950338067965891531314567700044562169555392318985425627587824189564936758334638422758018548205379946095656230088098497194911429097455517835766209926254093838949279255614155580082574101559184956877558684621996092259295199310020334122596531345535146190083661309416580028089934332719497483936614410247465513494914254515064554955192104069356086906182296412061652503732162920817206225197819535739095905868824723703597383345446816610150441533958876562403225505107686941993771099887102535740851877135973633361601969206621003852039319785115222636522316790828116676358924309491256084870842039901384038382158128190369590081078107787144776147252203088834930299167198719901167547390640066331161267902280008957979046023030507446888054981267220376439964117825607069102642580468992410980661822843516127033589402318817470289745033645531176683035236534222471295313824849489223104457398480048673107075163702802842101256983202070075659464720331219389154276083164892639359914728454346172289922660278788951794291002844567272769162953599185903450709593478214235793953082210008453185588191368022426095033231779706037690202056859144095966000941096422221221160067989808602510226167503845715092067100874633563304331206409030265389846179656776167983806285223804347530682724010039291194419386403588260238916734622470824995021504156110174706478876960917158071338322802881454305269710845000154741544904371811097526924919922862138728578694462011487504663714892881226509811953923950330074283522161311453465317264881780554843318735485845725886440262393947205506415048089642772424257384753290555363821601897523553216139653864048523393329408752893365314618817954974821233804596501724245883359328765129723627024409864467601189070912742833930790187393348361555550225846474994049546472063744975450472966480141071442898936126433210112376542717685028765504980246241976439123520105733373014372877289637486377124418826433222462994565673407543973840289169466141879966643706483421348084614147526175420037133576310886041907938386876";

	/**
	 * Valid profile public Key Y
	 * @var string
	 * @var string <= 256 characters length
	 **/
	protected $validProfilePublicKeyY = "kjaokfjgoiajf";

	/**
	 * Public Key Y 2 for encryption for profile unique from $validProfilePublicKeyY
	 *
	 * @var string > 256
	 **/
	protected $validProfilePublicKeyY2 = "djfadjklfaldkfj;";
	/**
	 * Invalid profile public key Y;
	 * @var string
	 * @var string > 256 characters length
	 **/
	protected $invalidProfilePublicKeyY = "dkajoikfdkgnakdgjgnakdfgjadjnaocjnviajnkjcajbcnadjfjadsnfajxcnviadigfasdnvcjbivbnavbadskdjcnvkjafjadnvkjnc vbkjasnvkjadsbsvbaskjvnkajsbdvjiafngvdkajdlkjfalkdjflkadjofijadksflaldksjflkjadslfkjasdidjfoadssfvkdsclkfvndsalkfdjaflkdalkfjdjflkadjflkajdslkfjasdlkfjoadsijfoaidsjkjvcnkajbfkdjbn";

	/**
	 * Valid profile Salt testing
	 * @var string
	 **/
	protected $validProfileSalt = "dfvnoint323fdndoo;";


	protected $profile; // profile

	/**
	 * constructor for this Profile
	 *
	 * @param int|null $newProfileId id of profile or null if a new profile.
	 * @param string $newProfileUserName string containing user name
	 * @param string $newProfilePublicKey string containing user public key data for encryption.
	 * @throws string for invalid argument
	 **/

	public final function setUp() {
		//run the default setup() method first
		parent::setUp();

	}

	/**
	 * Test adding to many characters to public key
	 **/

	/**
	 * test inserting a valid profile and verify that the actual mySQL data matches
	 **/
	public function testInsertValidProfile() {
		// clean out database
		parent::getTearDownOperation();

		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new profile and insert to mySQL
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());
//var_dump($profile);
		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);
//	var_dump($profile);
	}

	/**
	 * test inserting a profile that already exist
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidProfileName() {
		// create  a profile with a non null profile Id and watch if fail
		$profile = new Profile(KiteCryptTest::INVALID_KEY, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());
	}

	/**
	 * test inserting a profile, edit it, and then updating it
	 **/
	public function testUpdateValidProfile() {
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new profile and insert into mySQL
		$profile = new Profile(null, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);

		$profile->insert($this->getPDO());

		// edit the Profile and update it in mySQL
		$profile->setProfileUserName($this->validProfileUserName2);
		$profile->update($this->getPDO());

		// grab the data from mySQL and enforce the field match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName2);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);

		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());


	}


	/**
	 * test inserting too many characters into public key X
	 *
	 * @expectedException RangeException
	 **/
	public function testTooManyCharactersPublicKeyX() {
		//entered 1025 characters into profilePublicKey field
		$profile = new Profile(null, $this->validProfileUserName, $this->invalidProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());
	}


	public function testGetAllValidProfiles() {
		// add data to mysql in order to count
		$profile = new Profile(null, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());
		// add 2nd set of data to mysql in order to count to 2
		$profile2 = new Profile(null, $this->validProfileUserName2, $this->validProfilePublicKeyX2, $this->validProfilePublicKeyY2, $this->validProfileSalt);
		$profile2->insert($this->getPDO());


		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");


		// grab the data from mysql and enforce teh fields match our expectation
		$results = Profile::getAllProfiles($this->getPDO());
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("profile"));
		$this->assertCount(2, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\KiteCrypt\\Profile", $results);

		// grab the result from the array and validate it
		$pdoProfile = $results[0];
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);
	}

	/**
	 * test that two profiles are created, but only one profile is correctly deleted from database.
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidTweet() {
		//count the number of rows and save it for later
		$newRows = $this->getConnection()->getRowCount("profile");

		// create two profiles in order for one to be deleted
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile2 = new Profile($this->validProfileId, $this->validProfileUserName2, $this->validProfilePublicKeyX2, $this->validProfilePublicKeyY2, $this->validProfileSalt);

		// delete the profile2 from mysql
		$this->assertEquals($newRows, $this->getConnection()->getRowCount("profile"));
		$profile->delete($this->getPDO());

		// grab the data from mySQL and enforce the Profile does not exist
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assetCount($pdoProfile);
		$this->assertEquals($newRows, $this->getConnection()->getRowCount("profile"));
	}

	/**
	 * test creating a Profile and then deleting it
	 **/
	public function testDeleteValidProfile() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile(null, $this->validProfileUserName2, $this->validProfilePublicKeyX2, $this->validProfilePublicKeyY2, $this->validProfileSalt);
		$profile->insert($this->getPDO());

		// delete the Profile from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$profile->delete($this->getPDO());

		// grab the data from mySQL and enforce the Profile does not exist
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertNull($pdoProfile);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("profile"));
	}

	/**
	 * test grabbing a Profile by profile Public Key Y
	 **/
	public function testGetValidProfileByProfilePublicKeyY() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());


		// grab the data from mySQL and enforce the fields match our expectations
//		$results = Profile::getProfileByProfilePublicKeyY($this->getPDO(), $profile->getProfilePublicKeyY());
//		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
//		$this->assertCount(1, $results);
//		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\KiteCrypt\\Profile", $results);


		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfilePublicKeyY($this->getPDO(), $profile->getProfilePublicKeyY());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);

		// grab the result from the array and validate it
//		$pdoProfile = $results[0];
//		$this->assertEquals($pdoProfile->getProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);


	}





	/**
	 * test grabbing a Profile by profile Public Key X
	 **/
	public function testGetValidProfileByProfilePublicKeyX() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert to into mySQL
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Profile::getProfileByProfilePublicKeyX($this->getPDO(), $profile->getProfilePublicKeyX());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\KiteCrypt\\Profile", $results);

		// grab the result from the array and validate it
		$pdoProfile = $results[0];
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);
	}

	/**
	 * test deleting a Profile that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidProfile() {
		// create a Tweet and try to delete it without actually inserting it
		$tweet = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$tweet->delete($this->getPDO());
	}

	/**
	 * test grabbing a Profile by profileUserName that does not exist
	 **/
	public function testGetInvalidProfileByProfileUserName() {
		// grab a tweet by searching for content that does not exist
		$profile = Profile::getProfileByUserName($this->getPDO(), "you will find nothing");
		$this->assertCount(0, $profile);
	}

	/**
	 * test inserting too many characters into public key Y
	 *
	 * @expectedException RangeException
	 **/
	public function testInvalidProfilePublicKeyY() {
		//entered 1025 characters into profilePublicKey field
		$profile = new Profile(null, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->invalidProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());
	}

	/**
	 * test inserting too many characters into Password Salt
	 *
	 * @expectedException RangeException
	 **/
	public function testInvalidProfilePasswordSalt() {
		//entered 1025 characters into profilePublicKey field
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->invalidProfilePublicKeyY);
		$profile->insert($this->getPDO());
	}

	/**
	 * test inserting too many characters into User Name
	 *
	 * @expectedException RangeException
	 **/
	public function testInvalidUserName() {
		//entered 1025 characters into profilePublicKey field
		$profile = new Profile($this->validProfileId, $this->invalidProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfilePublicKeyY);
		$profile->insert($this->getPDO());
	}

	/**
	 *test pulling salt
	 **/
	public function testPullingValidSalt() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");

		// create a new Profile and insert into mySQL
		$profile = new Profile($this->validProfileId, $this->validProfileUserName, $this->validProfilePublicKeyX, $this->validProfilePublicKeyY, $this->validProfileSalt);
		$profile->insert($this->getPDO());
		//var_dump($profile);

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Profile::getProfileByProfilePasswordSalt($this->getPDO(), $profile->getProfilePasswordSalt());
		$this->assertEquals($numRows +1, $this->getConnection()->getRowCount("profile"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\KiteCrypt\\Profile", $results);

		// grab the result from the array and validate it
		$pdoProfile = $results[0];

		$this->assertEquals($pdoProfile->getProfileUserName(), $this->validProfileUserName);
		$this->assertEquals($pdoProfile->getProfilePublicKeyX(), $this->validProfilePublicKeyX);
		$this->assertEquals($pdoProfile->getProfilePublicKeyY(), $this->validProfilePublicKeyY);
		$this->assertEquals($pdoProfile->getProfilePasswordSalt(), $this->validProfileSalt);
	}








}