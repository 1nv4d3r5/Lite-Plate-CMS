SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lite_plate`
--
DROP DATABASE IF EXISTS `lite_plate`;
CREATE DATABASE `lite_plate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lite_plate`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_entries`
--

DROP TABLE IF EXISTS `blog_entries`;
CREATE TABLE `blog_entries` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `date` char(64) NOT NULL,
  `entry` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `blog_entries`
--

INSERT INTO `blog_entries` (`id`, `title`, `date`, `entry`) VALUES
(1, 'Placerat enim netus diam lacus', 'June 5, 2011', '<p>Molestie massa iaculis turpis facilisi, luctus semper, cubilia dictumst porttitor aptent hendrerit dignissim dictum ullamcorper Massa cubilia, massa natoque conubia pharetra aptent placerat enim netus diam lacus nonummy mollis sem hac vivamus volutpat nisi facilisi, fringilla auctor eros turpis.</p>\r\n<p>Arcu, curae; montes pharetra quisque blandit vel auctor nisi <strong>integer</strong> at blandit Taciti lacus elementum.</p>\r\n<p>Ad nibh. Diam et sapien amet arcu dictum mauris et eu dis egestas suspendisse mattis ut taciti sociis porttitor viverra feugiat praesent hymenaeos.</p>\r\n<p>Vehicula arcu netus. <em>Convallis</em> elementum orci gravida. Aptent, a nullam. Dictum Elit platea ipsum porttitor sed sodales. Urna luctus, natoque laoreet. Primis nibh, potenti Euismod varius potenti. Consequat diam, euismod dapibus sem tincidunt <em>semper</em> eleifend.</p>\r\n<p>Malesuada magnis conubia. Lobortis pede nascetur faucibus massa. At hymenaeos. Dis vestibulum scelerisque parturient fusce dictum iaculis euismod.</p>\r\n<p>Tempor dis, <em>praesent</em> in id lobortis fringilla pede imperdiet placerat commodo curae;. Nec torquent, sociosqu venenatis etiam varius praesent.</p>\r\n<h2>Ultricies Pulvinar Euismod Nullam Cum Sed</h2>\r\n<p>Posuere, ullamcorper magnis pellentesque <strong>nulla</strong> augue et facilisis feugiat nullam duis, turpis primis gravida dolor. <strong>Malesuada</strong> viverra auctor habitant per Pretium nunc tristique eget. Non posuere cras dis <strong>dignissim</strong> nunc.</p>\r\n<p>Sociis pharetra et sociosqu hendrerit egestas dolor mus <em>justo</em> morbi vel metus arcu. <em>Ac</em> porta molestie est vehicula malesuada vitae. Sapien.</p>'),
(2, 'Convallis In Sodales Fusce Risus Bibendum Egestas', 'June 16, 2011', '<p>Lacinia cras senectus. Hendrerit accumsan arcu sociis. Cum eu. Fames venenatis montes praesent leo leo commodo ridiculus felis ultrices Tristique urna <strong>dignissim</strong> risus, leo. Faucibus feugiat urna velit commodo dis tempus vulputate. Habitant.</p><p>Quam massa et cum lorem primis interdum nam <strong>et</strong> erat risus condimentum. Montes. Platea mollis elit, in nulla mattis. Non pellentesque volutpat.</p><p>Ullamcorper <em>integer</em> leo nam risus ridiculus. Consequat suspendisse, ullamcorper per viverra tristique. Lobortis dui Feugiat porttitor aliquet duis hymenaeos praesent pulvinar dolor.</p><p>Mattis. Tincidunt consequat aliquam montes varius nisi. Ante, venenatis montes fringilla aliquam purus primis quam. Quisque.</p><p>Placerat nec. Dui elementum fermentum lorem id felis nisi id mi aliquet curabitur at vehicula libero diam nisi ultricies morbi a feugiat mi torquent, metus, dictum commodo habitasse nibh urna semper ornare.</p><p>Justo tortor cras aenean diam luctus nunc fermentum eros. Tempor pulvinar, nulla nisi lacus inceptos justo tristique, etiam. Mattis.</p>\r\n<h2>Ultricies Magna Justo Dis</h2><p>Ad augue dignissim nec varius venenatis vehicula. <em>Mus</em> massa. Fringilla faucibus ligula potenti faucibus urna lorem quam nec donec malesuada consectetuer inceptos adipiscing. Pharetra mi augue tempus. Pede mauris nisl hac quis lacus. Ultrices malesuada natoque lectus pretium netus.</p><p>Natoque. Nunc mus. Id lobortis vestibulum, <em>vulputate</em> torquent pulvinar netus suscipit fames ac turpis tellus venenatis erat.</p>'),
(3, 'Felis Non Vestibulum', 'August 3, 2011', '<p>Ultrices nisl etiam lorem maecenas bibendum <strong>sed</strong> nostra nascetur porta vehicula ultrices hymenaeos donec nec eleifend class faucibus. Lobortis est fusce, fames volutpat urna tempor vitae habitasse habitant eget aliquet ultrices est, ipsum ad.</p>\r\n<p>Amet mollis. Per dictumst neque feugiat natoque porttitor justo facilisi. Augue hac auctor mus et adipiscing dignissim.</p>\r\n<p>Vivamus. Eleifend venenatis. Cursus vel. A erat, leo euismod eros dignissim eget ipsum hendrerit dignissim sociis aliquet. Nascetur ac sagittis.</p>\r\n<p>Lectus platea nunc auctor nulla faucibus sed imperdiet mi. Lacus praesent et quisque quisque <strong>nisi</strong> class convallis libero porttitor quis.</p>\r\n<p>Nulla Mollis cum dictum litora nibh hac purus integer ligula vivamus curae; natoque aptent.</p>\r\n<h2>Ullamcorper Netus Dapibus Ornare Dis Eu</h2>\r\n<p><em>Cubilia</em> pulvinar, sodales pede <em>laoreet</em> convallis ac ad turpis sociosqu porta nonummy. Risus <strong>primis</strong> <strong>arcu</strong> duis, blandit nec rhoncus laoreet. Amet natoque justo varius eleifend, praesent. Sociis commodo hymenaeos vel <strong>metus</strong> imperdiet semper maecenas potenti.</p>\r\n<p>Taciti fringilla dis curabitur habitant aenean phasellus sem enim vel consequat interdum blandit imperdiet mi egestas. Velit mi dui bibendum euismod <em>hymenaeos</em> congue eu vehicula nibh penatibus. Senectus adipiscing. <strong>Semper</strong> tellus nascetur posuere pretium dis.</p>\r\n<h2>Per Congue Tristique Suspendisse Malesuada Ultricies Egestas Arcu</h2>\r\n<p>Lorem semper. Taciti diam at lacus quam hymenaeos hendrerit urna sociosqu <em>conubia</em> in suspendisse arcu netus viverra porttitor nam ac curae; Fermentum pellentesque hac mollis.</p>'),
(4, 'Ornare Class Potenti Ultricies In Imperdiet Conubia Ut', 'August 11, 2011', '<p>Curabitur primis suspendisse neque, euismod <strong>tempus</strong> aenean commodo. Malesuada eros vulputate consequat. Amet torquent inceptos aenean mollis magnis montes netus ac. Sed nullam nascetur erat iaculis.</p>\r\n<p>Laoreet praesent mollis primis placerat odio <strong>cum</strong> tellus, semper. Lobortis. Erat, montes ad mus vestibulum fermentum purus blandit.</p>\r\n<p>Orci. Dolor scelerisque integer volutpat turpis <strong>orci</strong> dictumst nisl elit luctus a etiam litora risus, ultrices bibendum molestie vulputate rhoncus varius blandit tristique posuere erat scelerisque <strong>pede</strong> tortor curae;. Arcu pede aptent pulvinar. Ornare hendrerit dui.</p>\r\n<h2>Laoreet Venenatis Ultricies Bibendum Magnis Varius</h2>\r\n<p>Phasellus nonummy. Consequat natoque sollicitudin pretium congue eleifend praesent parturient in facilisi aliquam risus varius porta et tortor volutpat fusce, montes tristique vitae vestibulum torquent. Vehicula, tincidunt lorem vivamus, porta ipsum phasellus fringilla. Sapien orci augue.</p>\r\n<p>Feugiat massa mi quis curabitur nonummy magnis enim sed tincidunt cum quisque elementum Maecenas proin nam risus ac tortor.</p>\r\n<p>Taciti etiam massa <strong>lectus</strong> laoreet molestie ipsum facilisis. Platea <em>neque</em> tellus <em>a</em> lacinia platea. Faucibus sed donec lacinia dignissim. Libero facilisis donec at vitae urna quam rhoncus venenatis. Viverra sociosqu adipiscing. Non sed hendrerit.</p>\r\n<p>Condimentum lobortis sollicitudin aptent Lectus mollis et <strong>sem</strong> netus nunc ac iaculis hendrerit natoque nullam blandit, vitae volutpat lobortis convallis nostra sit.</p>\r\n<p>Dictumst leo sodales. Conubia, <strong>fringilla</strong> dignissim nec nascetur accumsan. Dolor feugiat, malesuada. Laoreet. Ridiculus fusce, facilisi. Euismod ad aptent varius sagittis quam hac.</p>\r\n<p>Inceptos natoque natoque parturient Mollis semper euismod iaculis sed sociis fringilla duis justo ligula diam <strong>sodales</strong> torquent dictum.</p>\r\n<h2>Ut Dui Pulvinar</h2>\r\n<p>Arcu sociosqu aliquet aliquam potenti aliquet montes <em>mauris</em> vel non porttitor vestibulum <em>a</em> nostra pulvinar, ultricies metus tempus fusce habitasse.</p>\r\n<p>Mauris pellentesque fusce nostra a faucibus inceptos blandit, aliquet urna dis, porta <em>senectus</em> eget euismod inceptos.</p>\r\n<p>Massa. Convallis, rhoncus, sociis cras eros nullam nam magnis fusce rhoncus amet habitasse potenti elit molestie sociosqu sollicitudin purus pulvinar. Eget gravida tristique. Pretium at id. Curae; ipsum imperdiet facilisis libero tortor.</p>\r\n'),
(5, 'Mattis Dapibus Posuere Sociosqu Fringilla Amet Bibendum Nulla', 'August 16, 2011', '<p>Pulvinar montes aliquam turpis eu Parturient dolor tellus nisl viverra vehicula curabitur fringilla eu hac vehicula. Nisl augue condimentum amet primis. Sapien pretium, maecenas mattis. Sagittis congue velit. Vitae. Eu. Non cubilia. Porta inceptos inceptos donec risus. Bibendum cursus.</p>\r\n<p>Nostra tellus lectus venenatis eu aliquam vitae sit dictumst a consequat Suspendisse, tempus etiam sed aenean etiam ligula mi dis suspendisse mollis montes, lacus vulputate hendrerit pharetra. Vulputate.</p>\r\n<p>Laoreet vitae montes augue volutpat. Tincidunt fermentum in sociosqu suscipit. Pede dictum fames primis netus faucibus sociosqu lectus nisl convallis curabitur volutpat suspendisse tincidunt magnis ut egestas, sem gravida. Elit.</p>\r\n<p>Suscipit eros suspendisse condimentum ut inceptos a mattis elit morbi ipsum, sociosqu phasellus mattis conubia sociosqu sociis vehicula condimentum, lacus natoque.</p>\r\n<h2>Mollis Turpis Eleifend Curae; Etiam Sodales Blandit</h2>\r\n<p>Magna mollis scelerisque ligula rutrum. Et, tempor faucibus habitasse velit quam ultrices aptent litora hendrerit. Condimentum facilisi. Dolor orci sed felis massa vestibulum fames velit natoque elementum etiam Facilisi montes auctor pede tincidunt vel ultrices purus adipiscing potenti. Justo dui malesuada ac massa.</p>\r\n<h2>Dignissim Etiam A Nec Laoreet Tortor Dui</h2>\r\n<p>Ut id. Varius duis morbi sed. Class sociosqu vestibulum aliquet quis rutrum montes suspendisse laoreet interdum. Per ridiculus posuere odio nam, nonummy ultrices ornare molestie. Nibh.</p>\r\n<p>Netus. In vulputate primis egestas lacus. Scelerisque laoreet lacus magnis a taciti sociis curae; orci. Egestas purus eu natoque et volutpat consequat curae; eros Sociis diam, feugiat sagittis morbi aptent nunc. Nam et, augue. Duis sociosqu lacinia cum accumsan platea feugiat vehicula.</p>\r\n<p>Aliquet fermentum ornare dictum feugiat rhoncus, habitasse cubilia leo euismod posuere. Inceptos convallis pharetra. Nullam vitae in velit morbi dolor scelerisque venenatis tincidunt non nam quam ullamcorper id. Felis pede.</p>\r\n<p>At morbi sociosqu quisque consequat odio lectus Arcu mi gravida ullamcorper morbi. Magnis commodo. Auctor aliquet aliquet cum inceptos nec felis sollicitudin.</p>\r\n<p>Iaculis, ad suscipit orci lectus habitant cras et dictum eleifend eget laoreet gravida elit gravida. Dignissim enim fames in.</p>'),
(6, 'Vel Nibh Gravida Scelerisque Penatibus Gravida Tincidunt', 'August 26, 2011', '<p>Sed tincidunt eu cursus sociis dignissim semper feugiat condimentum Turpis nascetur. Ullamcorper parturient, ut vehicula tincidunt cursus lobortis fames ligula fringilla integer nisl adipiscing rhoncus. Sagittis ridiculus ligula nec curabitur tempor laoreet fringilla dis suscipit diam venenatis convallis.</p>\r\n<p>Sed pretium penatibus accumsan Sem magnis. Elit conubia. Habitant litora praesent malesuada nec.</p>\r\n<p>Dolor erat aenean auctor Fames. Facilisis euismod posuere. Torquent facilisi ante senectus inceptos, nibh pretium, orci commodo magnis consequat phasellus mauris. Hac Ligula. Venenatis odio pulvinar lectus curae; vitae mattis pretium pretium fermentum dapibus curae;.</p>\r\n<h2>Elementum Libero Ridiculus Augue Diam At</h2>\r\n<p>In maecenas euismod mus ridiculus nisi. Aliquam commodo diam viverra quisque eros in. Cras id viverra Elit sollicitudin. A maecenas libero laoreet augue faucibus cras suspendisse eros Dictumst.</p>\r\n<p>Mi ut aliquam nullam ac. Nec vestibulum pulvinar. Porta ut dictumst ac nascetur, rutrum elementum nisi, etiam.</p>\r\n<p>Nam. Ipsum nascetur tellus metus. Potenti, pulvinar ligula. Lobortis ut tristique curabitur dolor lorem inceptos id adipiscing porttitor eget condimentum sem sapien ridiculus eget porta. Condimentum nascetur porttitor ad elementum metus.</p>\r\n<p>Pretium nunc mauris aliquet. Elementum, metus elit commodo facilisi. Nam porta praesent ut. Fermentum viverra augue penatibus id felis inceptos, arcu pede hendrerit convallis sociis Nam. Tempus class aliquam odio eget adipiscing placerat id nibh ridiculus.</p>\r\n<h2>Sem Integer Metus</h2>\r\n<p>Orci nullam natoque hendrerit. Eget magnis a cras Pulvinar. Potenti. Non ligula est felis. Litora platea. Accumsan elit vel Donec quam morbi auctor felis.</p>\r\n<p>Nonummy. Gravida lacinia nibh semper euismod Suscipit convallis eros quam at pharetra placerat congue. Mus et sem accumsan parturient eros aliquam lobortis feugiat vitae conubia sit. Fames augue venenatis elementum mollis pretium nulla. Mi venenatis magna adipiscing dui habitasse.</p>\r\n<p>Turpis. Luctus rhoncus. Torquent. Fringilla facilisi quis, velit purus diam. Lobortis dis. Parturient aliquam hymenaeos odio hendrerit phasellus morbi ante arcu quisque. Nunc ut congue vestibulum blandit platea turpis vel etiam dui vestibulum ut. Class libero etiam. Facilisi metus.</p>'),
(7, 'Mus Iaculis Natoque Luctus Orci', 'September 1, 2011', '<p>Justo netus Ad egestas ultricies lobortis dis, faucibus elit ac id. Ullamcorper tristique quisque suscipit fermentum purus eu. Sodales curabitur, cras vestibulum a vitae, penatibus cum viverra. Laoreet faucibus. Cras fames maecenas tincidunt eros.</p>\r\n<h2>Ullamcorper Ante Tincidunt Non Primis Rutrum</h2>\r\n<p>Sociis porttitor in malesuada. Gravida nascetur. Sociosqu sapien egestas venenatis ultricies egestas morbi praesent dis. Posuere praesent id praesent.</p>\r\n<p>Augue sociis sodales venenatis porttitor pulvinar dapibus phasellus faucibus, dictumst phasellus mollis eu faucibus feugiat ultricies felis fusce eros leo vehicula imperdiet.</p>\r\n<p>Luctus luctus eros fusce metus duis. Montes egestas dolor sit posuere orci. Tincidunt risus facilisi. Facilisi taciti praesent massa nonummy aenean. Iaculis nibh cras hendrerit nisi iaculis fames sociis. Aliquam fames suscipit magnis.</p>\r\n<p>Euismod phasellus metus aenean nisl iaculis enim dui velit vitae faucibus fermentum nec Praesent viverra dictumst cubilia viverra bibendum fusce torquent lacinia nisl Eu, lorem laoreet maecenas pretium viverra nibh nullam eget laoreet. Accumsan lacinia non magnis. Senectus porta. Magnis, elementum.</p>\r\n<p>Magna mus non nullam nunc curabitur nibh nibh natoque mattis purus dis eu habitant. Class tristique torquent adipiscing quisque. Aliquam ultrices nonummy vitae, varius, aptent. Felis. Viverra facilisis litora turpis condimentum taciti class maecenas porttitor. Magna suscipit dolor pulvinar dui consequat pulvinar.</p>\r\n<p>Torquent. Bibendum adipiscing a maecenas. Est facilisi montes varius etiam tortor sed viverra orci magna at est aenean congue natoque nisl nullam eleifend duis, ipsum varius.</p>\r\n<h2>Netus Est Enim Semper Neque</h2>\r\n<p>Primis lobortis convallis quis blandit Ac. Semper senectus fermentum etiam mattis. Enim orci rutrum porttitor eu litora fermentum varius mi, pulvinar consequat pharetra, quisque porta habitasse.</p>\r\n<p>Sed. Hendrerit, velit aenean viverra luctus laoreet nisi Quis et nibh nascetur. Posuere suspendisse enim parturient, mauris. Ante velit cras diam laoreet hendrerit nostra metus. Nisi posuere sem. Blandit etiam.</p>\r\n<p>Gravida tortor nisi bibendum fringilla Tempus interdum sit pede dui hac id orci quam blandit quisque nisi nibh donec sollicitudin condimentum ante mi a nonummy, condimentum suspendisse.</p>'),
(8, 'Adipiscing Montes Commodo Ultricies Laoreet Nibh Purus', 'September 3, 2011', '<p>Lacinia nisi facilisis netus amet ut a. Netus etiam, pharetra. Lacinia congue adipiscing. Duis praesent luctus vivamus hac orci cras eu praesent.</p>\r\n<p>Mattis elementum, dapibus sapien proin donec molestie cubilia consectetuer senectus eros cursus Vel potenti habitant molestie id duis suspendisse <strong>congue</strong> <em>amet</em> curabitur rhoncus magna facilisis.</p>\r\n<p>In dapibus eleifend, platea vitae viverra <strong>amet</strong> hymenaeos pede tincidunt arcu sollicitudin ornare nulla. Sem massa turpis. Eros, primis fames pellentesque habitant. Lacinia risus nostra est ut potenti facilisi sodales volutpat. Bibendum luctus orci.</p>\r\n<p>Ut. Potenti vehicula dignissim varius venenatis dis ut sollicitudin. Dis magna aenean cursus. Libero lectus facilisis sed tincidunt curabitur Laoreet semper arcu faucibus inceptos non senectus felis fringilla cras ornare, purus torquent placerat.</p>\r\n<p>Ultricies <em>Mollis</em> suspendisse integer condimentum dui. Auctor augue nostra. Mollis pharetra fusce iaculis nibh, neque in nec. Placerat ante, iaculis Vel cras potenti donec.</p>\r\n<p>At dolor <em>suspendisse</em> in. Fusce, nonummy facilisis class primis pulvinar sollicitudin integer. Ornare ac magnis habitasse, nec leo imperdiet.</p>\r\n<p>Massa condimentum hac varius. Hendrerit risus elementum consectetuer Eleifend sollicitudin massa vivamus. Gravida nonummy montes scelerisque tincidunt mi penatibus pulvinar sollicitudin sociosqu arcu nam pede nisi dolor. Dui ad velit sapien nonummy. Ipsum.</p>\r\n<p>Nec <em>etiam</em> risus massa elit auctor arcu hac consequat. Primis felis sociis ante nunc <em>dui</em> aliquam dapibus laoreet cubilia vivamus parturient. Vel tortor. Turpis vel leo nec. Dictum.</p>\r\n<p>Dis semper, purus gravida volutpat, euismod ultrices scelerisque malesuada sapien torquent, sed nisi mollis ridiculus integer volutpat montes metus <em>quisque</em> molestie nascetur. Conubia turpis. Erat aliquet pulvinar Tincidunt elit tincidunt velit platea eros. Lectus ultricies sapien. Nonummy hendrerit duis interdum.</p>\r\n<h2>Class Nisi Non Aliquet Imperdiet Consectetuer Ut Metus</h2>\r\n<p>Nullam eu. Montes tristique in. Hendrerit eu <strong>fames</strong> penatibus ligula, sollicitudin felis, curabitur, ad conubia accumsan ut parturient ornare nullam odio gravida luctus purus.</p>\r\n<p>Aliquet donec. Netus. Dapibus porttitor fames senectus lobortis a inceptos leo dictumst. Magna et montes velit laoreet. Sodales.</p>'),
(9, 'Bibendum Enim Nunc Leo Penatibus Habitant Integer Imperdiet', 'September 5, 2011', '<p>Malesuada aptent. Sociis integer vulputate enim suscipit blandit blandit elit potenti curabitur pede donec sit cras, molestie interdum vehicula. Semper rhoncus venenatis varius venenatis non. Nostra nam. Est netus pretium nibh.</p>\r\n<p>Eget fames suspendisse sodales maecenas imperdiet cras, maecenas, dolor aliquam natoque mauris risus nunc praesent Nisi, habitasse sagittis ornare nec Eros ligula leo cras. Sodales. Nascetur nullam rhoncus. Massa viverra tortor vel pharetra curae;, lobortis.</p>\r\n<p>Nullam ac ultrices iaculis eu. Pulvinar <strong>potenti</strong> et imperdiet Molestie commodo aenean eros venenatis vehicula.</p>\r\n<p>Sem dignissim est. Nam gravida vulputate placerat ut erat pulvinar venenatis facilisis vivamus. Netus diam cum <em>cum</em> ridiculus ornare parturient habitasse tortor malesuada fringilla eros quam.</p>\r\n<p>Sapien accumsan lectus neque magnis pede porttitor Ipsum vel <strong>pellentesque</strong> ornare sodales arcu porta mauris, ridiculus non in.</p>\r\n<p>Blandit etiam aliquet. Class inceptos mollis leo commodo metus enim, ipsum ultrices erat Vivamus torquent blandit malesuada, conubia neque est quis libero luctus taciti turpis ut vestibulum lacus habitasse fusce tempus nascetur conubia aliquam.</p>\r\n<p>Laoreet eu nascetur tempus facilisis platea duis mus sem aliquam neque ad est ut ultricies hac ultrices quis rutrum. Justo magnis blandit molestie malesuada mattis hymenaeos sociosqu. Nisi, netus lacinia pharetra.</p>\r\n<p><em>Nulla</em> quam, mauris donec vehicula, consequat habitant vestibulum vulputate ipsum imperdiet bibendum dolor netus. Aenean ante quam dapibus, netus mattis cubilia nisl imperdiet nascetur tellus penatibus viverra sociis venenatis ipsum. Ac felis lorem eros dolor.</p>\r\n<p>Consectetuer erat, odio rhoncus cum facilisis. Imperdiet. Tincidunt tellus sed hac dignissim quam magna risus, donec mollis fringilla posuere erat ipsum amet montes.</p>\r\n<p><em>Dictum</em> augue metus amet pellentesque pretium bibendum primis potenti posuere eget Pretium enim. Sollicitudin sapien Elit magnis nulla curae;. Lorem cubilia rutrum. Vel. Dapibus class. Platea sem donec. Nec.</p>\r\n<p>Faucibus magna. Laoreet ad per tempor enim. Tristique laoreet placerat, ipsum lectus sit velit varius nec. Magnis magnis. Posuere ultrices aenean <em>per</em> elementum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `error_content`
--

DROP TABLE IF EXISTS `error_content`;
CREATE TABLE `error_content` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` char(255) NOT NULL,
  `page` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `error_content`
--

INSERT INTO `error_content` (`id`, `content`, `page`) VALUES
(1, '<h1>Error 403</h1>\r\n<h3>Private Page</h3>\r\n<p>\r\nSorry but you''re not allowed to access this page.\r\n<br>\r\nWould you like to <a href="<?php echo WEB_ROOT; ?>" title"Return to the Home page?">go home</a>?\r\n</p>', '403'),
(2, '<h1>Error 404</h1>\r\n<h3>Page Not Found</h3>\r\n<p>\r\nSorry but we can''t find that page!\r\n<br>\r\nWould you like to <a href="<?php echo WEB_ROOT; ?>" title="Return to the Home page?">go home</a>?\r\n</p>', '404'),
(3, '<h2>Error 500</h2>', '500');

-- --------------------------------------------------------

--
-- Table structure for table `node_1`
--

DROP TABLE IF EXISTS `node_1`;
CREATE TABLE `node_1` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL,
  `url` char(255) NOT NULL,
  `title` char(128) NOT NULL,
  `parent` char(32) NOT NULL,
  `children` char(255) NOT NULL,
  `body_id` char(32) NOT NULL,
  `type` char(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `node_1`
--

INSERT INTO `node_1` (`id`, `name`, `url`, `title`, `parent`, `children`, `body_id`, `type`) VALUES
(1, 'Home', '', '', 'root', 'NULL', 'home', 'main'),
(2, 'About', 'about/', '', 'root', 'NULL', 'about', 'main'),
(3, 'Download', 'download/', '', 'root', 'NULL', 'download', 'main'),
(4, 'Blog', 'blog/', '', 'root', 'NULL', 'blog', 'main'),
(5, 'Sign In', 'login/', 'Sign in to access your account', 'root', 'NULL', 'login', 'login'),
(6, 'Sign Up', 'register/', 'Sign up! It''s easy and free!', 'root', 'NULL', 'register', 'login'),
(7, '404', '', 'Error 404: You''re doing it wrong!', 'NULL', 'NULL', '404', 'error'),
(8, '403', '', 'Error 403: You''re not allowed to see that!', 'NULL', 'NULL', '403', 'error'),
(9, '500', '', 'Error 500: Something''s not working!', 'NULL', 'NULL', '500', 'error'),
(10, 'login_attempt', 'login_attempt/', 'Attempting to Sign In', 'NULL', 'NULL', 'login_attempt', 'hidden');

-- --------------------------------------------------------

--
-- Table structure for table `node_1_content`
--

DROP TABLE IF EXISTS `node_1_content`;
CREATE TABLE `node_1_content` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `subcontent` text NOT NULL,
  `script_url` char(255) NOT NULL,
  `page` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `node_1_content`
--

INSERT INTO `node_1_content` (`id`, `content`, `subcontent`, `script_url`, `page`) VALUES
(1, '<h1><a href="">Felis Habitant Molestie Aliquam Primis Suscipit Etiam Tempor Ante Magna</a></h1>\r\n<p>\r\nPorttitor class. Curabitur. Etiam tempor ante magna. Sociis adipiscing.\r\nSemper vitae dolor luctus sem nulla nisi amet sociis nisl scelerisque ad\r\nmolestie fames convallis dis adipiscing lorem quam duis adipiscing fusce magnis\r\n<em>integer</em> id <strong>potenti</strong> per ac aptent\r\n<strong>massa</strong> feugiat <em>mi</em> venenatis <strong>sed</strong>\r\n<a href="">consectetuer nisl et lectus montes aenean</a> eleifend neque dictumst sit vivamus\r\nullamcorper erat, torquent lorem mus praesent nec taciti montes tortor eros Id.\r\n</p>\r\n<h3>Facilisis facilisi diam lacinia aptent</h3>\r\n<p>\r\nPer class Eget tristique velit dapibus nonummy risus. Bibendum <em>dolor</em>\r\ndictum parturient dis congue purus a, etiam. Mattis fames justo metus at\r\neleifend magnis enim nisi Parturient. Dolor volutpat vestibulum etiam litora\r\nmolestie purus <em>purus</em> magna magna lacinia dictum faucibus class\r\nfacilisis facilisi diam lacinia aptent, dapibus et. Scelerisque aliquam\r\nUllamcorper etiam ridiculus malesuada Dis platea.\r\n</p>\r\n<h2><a href="">Lectus Potenti Porta Euismod Hendrerit Fames</a></h2>\r\n<p>\r\nPorta euismod hendrerit fames. Ad quis at libero ultrices mollis risus\r\nelementum. Cubilia <a href="">ipsum hendrerit inceptos pede lectus</a> duis, facilisis sagittis\r\nElementum ultrices. Hymenaeos risus est mauris, nec cum libero amet vulputate\r\n<em>conubia</em> orci <em>iaculis</em> non lectus nulla habitant curabitur\r\nvarius. Phasellus.\r\n</p>\r\n<h3>Cubilia ipsum hendrerit inceptos pede lectus duis</h3>\r\n<p>\r\nLectus justo arcu natoque erat. <strong>Per</strong>\r\nultricies ad curae;, cum accumsan elementum nisi aliquet rutrum adipiscing, cras\r\nenim, lacinia netus orci Sodales. <strong>Habitasse</strong> ad non venenatis\r\npraesent <a href="">ultrices imperdiet suspendisse potenti volutpat laoreet</a> rhoncus justo\r\nmi taciti <strong>fringilla</strong> a per augue fermentum nam ridiculus\r\nvestibulum. Lacinia elit turpis duis. Class. Mattis pretium mollis consequat\r\nauctor rutrum vitae netus nisl hymenaeos integer posuere pulvinar est.\r\n</p>\r\n<h2><a href="">Magnis Malesuada Hac Amet Ut Pede Morbi</a></h2>\r\n<p>\r\nInteger proin. Sociis sociis tellus hendrerit torquent enim. Massa\r\nullamcorper mollis ut massa sapien <em>aptent</em> nostra ultricies aliquam\r\nfames, nisl habitant diam praesent leo suscipit fusce adipiscing, felis morbi.\r\nVelit nam justo leo pharetra mus diam est. <strong>Mus</strong> lacinia inceptos\r\ninteger <a href="">adipiscing dui fermentum</a> scelerisque, nonummy placerat condimentum\r\nadipiscing convallis. Ad quis ultrices quisque<a href=""> porta consequat vel diam et\r\ncondimentum diam</a> hymenaeos quam cum venenatis vel facilisis, enim hac justo\r\ntortor metus.\r\n</p>', '<?php $this->get_blog()->display_recent_entries(); ?>', '', 'home'),
(2, '<h1>Augue</h1>\r\n<p>\r\nInceptos quisque ad senectus aliquam. Congue litora convallis magnis nunc\r\nfames eleifend placerat. Tortor <em>gravida</em> placerat feugiat cubilia.\r\nCubilia quam molestie consequat, morbi inceptos vitae eros aenean feugiat,\r\nviverra quis.\r\n</p>\r\n<h2>Suscipit Sodales Fusce Et</h2>\r\n<p>\r\nIaculis sociis nisi. Parturient maecenas dictumst placerat vestibulum\r\nhendrerit <a href="">arcu habitasse torquent molestie hendrerit ornare ut</a> auctor class mus.\r\nLibero luctus nunc euismod ultrices <a href="">Netus convallis laoreet facilisi nulla</a>\r\nnascetur pretium magnis luctus. Nostra leo curae; ligula sociis libero\r\n<strong>pharetra</strong> lectus ligula. Parturient semper lacinia. Dui,\r\nelementum lacinia eget.\r\n</p>\r\n<h2>Habitasse Adipiscing Facilisi Neque Morbi Tellus</h2>\r\n<p>Hac mattis risus hymenaeos dictum imperdiet nibh massa at mattis. Luctus.\r\nArcu natoque velit laoreet elit scelerisque torquent lacinia. Nullam cursus\r\n<em>dapibus</em> erat mus phasellus semper pretium, fames ante semper torquent\r\nmi. Sapien tortor proin primis curae;. Proin laoreet laoreet dapibus\r\nconsequat.\r\n</p>\r\n<p>Ac torquent proin. Litora per gravida mus iaculis risus et gravida consequat\r\nvitae <a href="">mus dui ac</a> scelerisque porta <a href="">Viverra cubilia urna platea</a> habitasse aliquam\r\niaculis gravida. At, non Blandit faucibus cubilia nunc nonummy. Varius\r\nvolutpat.\r\n</p>\r\n<h2>Metus Molestie Tempor Nonummy Tortor</h2>\r\n<p>\r\nLeo pharetra pharetra nascetur ornare faucibus, rhoncus orci justo metus\r\nsollicitudin felis parturient ridiculus. Hendrerit mollis libero dolor molestie\r\ntristique <a href="">ligula dolor vel semper convallis magna <strong>potenti</strong>\r\nsuscipit</a> erat mattis <em>vestibulum</em> felis. Ligula ut metus. Orci sed odio\r\niaculis elit est rutrum nisi sodales ridiculus cum class adipiscing ultricies\r\nultrices.\r\n</p>\r\n<p>\r\nVarius egestas habitasse ultricies vehicula nisi curabitur feugiat augue\r\nlaoreet. Nisl. Quis primis potenti dictumst nostra lorem. Fermentum class taciti\r\nvolutpat amet quam auctor molestie a varius, quis ad iaculis habitant.\r\n</p>\r\n<h2>Gravida Nec</h2>\r\n<p>\r\nMalesuada Tortor. Cubilia morbi ornare aenean nibh varius dignissim felis,\r\nac. Porta ac nunc massa dapibus litora.\r\n</p>\r\n<h2>Parturient</h2>\r\n<p>Pretium libero donec mauris ultricies <em>magnis</em> vel platea fames auctor\r\nmassa facilisis mollis <a href="">velit suscipit praesent</a> platea nunc nullam, fames\r\npraesent augue tempus <em>nostra</em> elementum. Nascetur sollicitudin litora.\r\nMalesuada condimentum. Aliquam eget velit, ad <em>mi</em> felis leo molestie\r\nsenectus interdum <em>nunc</em> praesent accumsan duis porttitor nisl.\r\n</p>', '<?php $this->get_blog()->display_recent_entries(); ?>', '', 'about'),
(3, '<h3>Coming Soon</h3>\r\n<p>It won''t be long now!</p>', '<?php $this->get_blog()->display_recent_entries(); ?>', '', 'download'),
(4, '<?php $this->get_blog()->display(); ?>', '<?php $this->get_blog()->display_archive_compact(); ?>', '', 'blog'),
(5, '<h1>Sign In</h1>\r\n<form method="post" action="http://localhost/login_attempt/" class="login_form">\r\n    <label for="login_email_input" class="login_input_label"><h3>Email</h3></label>\r\n    <input type="text" name="login_email_input" class="login_email_input" id="login_email_input" title="Enter your email address here" maxlength="64">\r\n    <label for="login_password_input" class="login_input_label"><h3>Password</h3></label>\r\n    <input type="password" name="login_password_input" class="login_password_input" id="login_password_input" title="Enter your password here" maxlength="16">\r\n    <em class="login_forgot_password"><a href="">Forgot Your Password?</a></em>\r\n    <label for="login_remember_email_checkbox" class="login_remember_email_label">\r\n        <input type="checkbox" class="login_remember_email_checkbox" id="login_remember_email_checkbox" name="login_remember_email_checkbox" value="1">\r\n        <strong>Remember My Email</strong>\r\n    </label>\r\n    <button type="submit" class="button" title="Sign in to the Users area">Sign In</button>\r\n</form>', '<h3>Access your account</h3>\r\n<ul class="subcontent_ul sans">\r\n	<li>Manage your pages</li>\r\n	<li>Edit your blog</li>\r\n	<li>Post new content</li>\r\n	<li>And much more!</li>\r\n</ul>\r\n<h3>Not a Member yet?</h3>\r\n<ul class="subcontent_ul sans">\r\n<li>\r\n<a href="http://localhost/register/" title="Join now it''s easy and free!" class="underline">Sign Up</a> now! It''s easy and free!\r\n</li>\r\n</ul>', 'http://localhost/script/form_scripts_min.php', 'login'),
(6, '<h2>Sign Up</h2>\r\n<p>Coming soon!</p>', '', '', 'register'),
(7, '<h2>Login Attempt</h2>\r\n', '', '', 'login_attempt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(32) NOT NULL,
  `password` char(60) NOT NULL,
  `salt` char(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`) VALUES
(1, 'admin', '$2a$10$1377d61faab5c95cac1b8u6aW2q3E/AkrstgEUWDMTEnyl2Z02VjS', '1377d61faab5c95cac1b89'),
(2, 'scott', '$2a$10$5f0b5b45541de270325bae9dOfZkFtwwv3x.J/8TVu0uzxR3.Cm5O', '5f0b5b45541de270325bae');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Make user for database
--

-- DROP USER 'lite_plate'@'localhost';
-- DROP USER 'lite_plate'@'%';

-- CREATE USER 'lite_plate'@'localhost' IDENTIFIED BY 'lite_plate';
-- CREATE USER 'lite_plate'@'%' IDENTIFIED BY 'lite_plate';
 
GRANT SELECT ON lite_plate.* TO 'lite_plate'@'localhost' IDENTIFIED BY 'lite_plate';
GRANT SELECT ON lite_plate.* TO 'lite_plate'@'%' IDENTIFIED BY 'lite_plate';
 
FLUSH PRIVILEGES;

-- --------------------------------------------------------
