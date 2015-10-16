/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ecmall

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-08-05 14:06:33
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ecm_acategory`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_acategory`;
CREATE TABLE `ecm_acategory` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_acategory
-- ----------------------------
INSERT INTO `ecm_acategory` VALUES ('1', '商城帮助', '0', '0', 'help');
INSERT INTO `ecm_acategory` VALUES ('2', '商城公告', '0', '0', 'notice');
INSERT INTO `ecm_acategory` VALUES ('3', '内置文章', '0', '0', 'system');
INSERT INTO `ecm_acategory` VALUES ('4', '新手上路', '1', '1', null);
INSERT INTO `ecm_acategory` VALUES ('5', '购物指南', '1', '2', null);

-- ----------------------------
-- Table structure for `ecm_address`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_address`;
CREATE TABLE `ecm_address` (
  `addr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phone_tel` varchar(60) DEFAULT NULL,
  `phone_mob` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`addr_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_address
-- ----------------------------
INSERT INTO `ecm_address` VALUES ('1', '4', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999');
INSERT INTO `ecm_address` VALUES ('2', '2', '测试', '65', '中国	重庆市	沙坪坝', '测试测试测试测试测试', '230000', '18212271611', '');

-- ----------------------------
-- Table structure for `ecm_article`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_article`;
CREATE TABLE `ecm_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `cate_id` int(10) NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `content` text,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `add_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `code` (`code`),
  KEY `cate_id` (`cate_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_article
-- ----------------------------
INSERT INTO `ecm_article` VALUES ('1', 'eula', '用户服务协议', '3', '0', '', '<p>特别提醒用户认真阅读本《用户服务协议》(下称《协议》) 中各条款。除非您接受本《协议》条款，否则您无权使用本网站提供的相关服务。您的使用行为将视为对本《协议》的接受，并同意接受本《协议》各项条款的约束。 <br /> <br /> <strong>一、定义</strong><br /></p>\r\n<ol>\r\n<li>\"用户\"指符合本协议所规定的条件，同意遵守本网站各种规则、条款（包括但不限于本协议），并使用本网站的个人或机构。</li>\r\n<li>\"卖家\"是指在本网站上出售物品的用户。\"买家\"是指在本网站购买物品的用户。</li>\r\n<li>\"成交\"指买家根据卖家所刊登的交易要求，在特定时间内提出最优的交易条件，因而取得依其提出的条件购买该交易物品的权利。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>二、用户资格</strong><br /> <br /> 只有符合下列条件之一的人员或实体才能申请成为本网站用户，可以使用本网站的服务。</p>\r\n<ol>\r\n<li>年满十八岁，并具有民事权利能力和民事行为能力的自然人；</li>\r\n<li>未满十八岁，但监护人（包括但不仅限于父母）予以书面同意的自然人；</li>\r\n<li>根据中国法律或设立地法律、法规和/或规章成立并合法存在的公司、企事业单位、社团组织和其他组织。</li>\r\n</ol>\r\n<p><br /> 无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不当注册为本网站用户或超过其民事权利或行为能力范围从事交易的，其与本网站之间的协议自始无效，本网站一经发现，有权立即注销该用户，并追究其使用本网站\"服务\"的一切法律责任。<br /> <br /> <strong>三.用户的权利和义务</strong><br /></p>\r\n<ol>\r\n<li>用户有权根据本协议的规定及本网站发布的相关规则，利用本网站网上交易平台登录物品、发布交易信息、查询物品信息、购买物品、与其他用户订立物品买卖合同、在本网站社区发帖、参加本网站的有关活动及有权享受本网站提供的其他的有关资讯及信息服务。</li>\r\n<li>用户有权根据需要更改密码和交易密码。用户应对以该用户名进行的所有活动和事件负全部责任。</li>\r\n<li>用户有义务确保向本网站提供的任何资料、注册信息真实准确，包括但不限于真实姓名、身份证号、联系电话、地址、邮政编码等。保证本网站及其他用户可以通过上述联系方式与自己进行联系。同时，用户也有义务在相关资料实际变更时及时更新有关注册资料。</li>\r\n<li>用户不得以任何形式擅自转让或授权他人使用自己在本网站的用户帐号。</li>\r\n<li>用户有义务确保在本网站网上交易平台上登录物品、发布的交易信息真实、准确，无误导性。</li>\r\n<li>用户不得在本网站网上交易平台买卖国家禁止销售的或限制销售的物品、不得买卖侵犯他人知识产权或其他合法权益的物品，也不得买卖违背社会公共利益或公共道德的物品。</li>\r\n<li>用户不得在本网站发布各类违法或违规信息。包括但不限于物品信息、交易信息、社区帖子、物品留言，店铺留言，评价内容等。</li>\r\n<li>用户在本网站交易中应当遵守诚实信用原则，不得以干预或操纵物品价格等不正当竞争方式扰乱网上交易秩序，不得从事与网上交易无关的不当行为，不得在交易平台上发布任何违法信息。</li>\r\n<li>用户不应采取不正当手段（包括但不限于虚假交易、互换好评等方式）提高自身或他人信用度，或采用不正当手段恶意评价其他用户，降低其他用户信用度。</li>\r\n<li>用户承诺自己在使用本网站网上交易平台实施的所有行为遵守国家法律、法规和本网站的相关规定以及各种社会公共利益或公共道德。对于任何法律后果的发生，用户将以自己的名义独立承担所有相应的法律责任。</li>\r\n<li>用户在本网站网上交易过程中如与其他用户因交易产生纠纷，可以请求本网站从中予以协调。用户如发现其他用户有违法或违反本协议的行为，可以向本网站举报。如用户因网上交易与其他用户产生诉讼的，用户有权通过司法部门要求本网站提供相关资料。</li>\r\n<li>用户应自行承担因交易产生的相关费用，并依法纳税。</li>\r\n<li>未经本网站书面允许，用户不得将本网站资料以及在交易平台上所展示的任何信息以复制、修改、翻译等形式制作衍生作品、分发或公开展示。</li>\r\n<li>用户同意接收来自本网站的信息，包括但不限于活动信息、交易信息、促销信息等。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>四、 本网站的权利和义务</strong><br /></p>\r\n<ol>\r\n<li>本网站不是传统意义上的\"拍卖商\"，仅为用户提供一个信息交流、进行物品买卖的平台，充当买卖双方之间的交流媒介，而非买主或卖主的代理商、合伙  人、雇员或雇主等经营关系人。公布在本网站上的交易物品是用户自行上传进行交易的物品，并非本网站所有。对于用户刊登物品、提供的信息或参与竞标的过程，  本网站均不加以监视或控制，亦不介入物品的交易过程，包括运送、付款、退款、瑕疵担保及其它交易事项，且不承担因交易物品存在品质、权利上的瑕疵以及交易  方履行交易协议的能力而产生的任何责任，对于出现在拍卖上的物品品质、安全性或合法性，本网站均不予保证。</li>\r\n<li>本网站有义务在现有技术水平的基础上努力确保整个网上交易平台的正常运行，尽力避免服务中断或将中断时间限制在最短时间内，保证用户网上交易活动的顺利进行。</li>\r\n<li>本网站有义务对用户在注册使用本网站网上交易平台中所遇到的问题及反映的情况及时作出回复。 </li>\r\n<li>本网站有权对用户的注册资料进行查阅，对存在任何问题或怀疑的注册资料，本网站有权发出通知询问用户并要求用户做出解释、改正，或直接做出处罚、删除等处理。</li>\r\n<li>用  户因在本网站网上交易与其他用户产生纠纷的，用户通过司法部门或行政部门依照法定程序要求本网站提供相关资料，本网站将积极配合并提供有关资料；用户将纠  纷告知本网站，或本网站知悉纠纷情况的，经审核后，本网站有权通过电子邮件及电话联系向纠纷双方了解纠纷情况，并将所了解的情况通过电子邮件互相通知对  方。 </li>\r\n<li>因网上交易平台的特殊性，本网站没有义务对所有用户的注册资料、所有的交易行为以及与交易有关的其他事项进行事先审查，但如发生以下情形，本网站有权限制用户的活动、向用户核实有关资料、发出警告通知、暂时中止、无限期地中止及拒绝向该用户提供服务：         \r\n<ul>\r\n<li>用户违反本协议或因被提及而纳入本协议的文件；</li>\r\n<li>存在用户或其他第三方通知本网站，认为某个用户或具体交易事项存在违法或不当行为，并提供相关证据，而本网站无法联系到该用户核证或验证该用户向本网站提供的任何资料；</li>\r\n<li>存在用户或其他第三方通知本网站，认为某个用户或具体交易事项存在违法或不当行为，并提供相关证据。本网站以普通非专业交易者的知识水平标准对相关内容进行判别，可以明显认为这些内容或行为可能对本网站用户或本网站造成财务损失或法律责任。 </li>\r\n</ul>\r\n</li>\r\n<li>在反网络欺诈行动中，本着保护广大用户利益的原则，当用户举报自己交易可能存在欺诈而产生交易争议时，本网站有权通过表面判断暂时冻结相关用户账号，并有权核对当事人身份资料及要求提供交易相关证明材料。</li>\r\n<li>根据国家法律法规、本协议的内容和本网站所掌握的事实依据，可以认定用户存在违法或违反本协议行为以及在本网站交易平台上的其他不当行为，本网站有权在本网站交易平台及所在网站上以网络发布形式公布用户的违法行为，并有权随时作出删除相关信息，而无须征得用户的同意。</li>\r\n<li>本  网站有权在不通知用户的前提下删除或采取其他限制性措施处理下列信息：包括但不限于以规避费用为目的；以炒作信用为目的；存在欺诈等恶意或虚假内容；与网  上交易无关或不是以交易为目的；存在恶意竞价或其他试图扰乱正常交易秩序因素；该信息违反公共利益或可能严重损害本网站和其他用户合法利益的。</li>\r\n<li>用  户授予本网站独家的、全球通用的、永久的、免费的信息许可使用权利，本网站有权对该权利进行再授权，依此授权本网站有权(全部或部份地)  使用、复制、修订、改写、发布、翻译、分发、执行和展示用户公示于网站的各类信息或制作其派生作品，以现在已知或日后开发的任何形式、媒体或技术，将上述  信息纳入其他作品内。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>五、服务的中断和终止</strong><br /></p>\r\n<ol>\r\n<li>在  本网站未向用户收取相关服务费用的情况下，本网站可自行全权决定以任何理由  (包括但不限于本网站认为用户已违反本协议的字面意义和精神，或用户在超过180天内未登录本网站等)  终止对用户的服务，并不再保存用户在本网站的全部资料（包括但不限于用户信息、商品信息、交易信息等）。同时本网站可自行全权决定，在发出通知或不发出通  知的情况下，随时停止提供全部或部分服务。服务终止后，本网站没有义务为用户保留原用户资料或与之相关的任何信息，或转发任何未曾阅读或发送的信息给用户  或第三方。此外，本网站不就终止对用户的服务而对用户或任何第三方承担任何责任。 </li>\r\n<li>如用户向本网站提出注销本网站注册用户身份，需经本网站审核同意，由本网站注销该注册用户，用户即解除与本网站的协议关系，但本网站仍保留下列权利：         \r\n<ul>\r\n<li>用户注销后，本网站有权保留该用户的资料,包括但不限于以前的用户资料、店铺资料、商品资料和交易记录等。 </li>\r\n<li>用户注销后，如用户在注销前在本网站交易平台上存在违法行为或违反本协议的行为，本网站仍可行使本协议所规定的权利。 </li>\r\n</ul>\r\n</li>\r\n<li>如存在下列情况，本网站可以通过注销用户的方式终止服务：         \r\n<ul>\r\n<li>在用户违反本协议相关规定时，本网站有权终止向该用户提供服务。本网站将在中断服务时通知用户。但如该用户在被本网站终止提供服务后，再一次直接或间接或以他人名义注册为本网站用户的，本网站有权再次单方面终止为该用户提供服务；</li>\r\n<li>一旦本网站发现用户注册资料中主要内容是虚假的，本网站有权随时终止为该用户提供服务； </li>\r\n<li>本协议终止或更新时，用户未确认新的协议的。 </li>\r\n<li>其它本网站认为需终止服务的情况。 </li>\r\n</ul>\r\n</li>\r\n<li>因用户违反相关法律法规或者违反本协议规定等原因而致使本网站中断、终止对用户服务的，对于服务中断、终止之前用户交易行为依下列原则处理：         \r\n<ul>\r\n<li>本网站有权决定是否在中断、终止对用户服务前将用户被中断或终止服务的情况和原因通知用户交易关系方，包括但不限于对该交易有意向但尚未达成交易的用户,参与该交易竞价的用户，已达成交易要约用户。</li>\r\n<li>服务中断、终止之前，用户已经上传至本网站的物品尚未交易或交易尚未完成的，本网站有权在中断、终止服务的同时删除此项物品的相关信息。 </li>\r\n<li>服务中断、终止之前，用户已经就其他用户出售的具体物品作出要约，但交易尚未结束，本网站有权在中断或终止服务的同时删除该用户的相关要约和信息。</li>\r\n</ul>\r\n</li>\r\n<li>本网站若因用户的行为（包括但不限于刊登的商品、在本网站社区发帖等）侵害了第三方的权利或违反了相关规定，而受到第三方的追偿或受到主管机关的处分时，用户应赔偿本网站因此所产生的一切损失及费用。</li>\r\n<li>对违反相关法律法规或者违反本协议规定，且情节严重的用户，本网站有权终止该用户的其它服务。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>六、协议的修订</strong><br /> <br /> 本协议可由本网站随时修订，并将修订后的协议公告于本网站之上，修订后的条款内容自公告时起生效，并成为本协议的一部分。用户若在本协议修改之后，仍继续使用本网站，则视为用户接受和自愿遵守修订后的协议。本网站行使修改或中断服务时，不需对任何第三方负责。<br /> <br /> <strong>七、 本网站的责任范围 </strong><br /> <br /> 当用户接受该协议时，用户应明确了解并同意∶</p>\r\n<ol>\r\n<li>是否经由本网站下载或取得任何资料，由用户自行考虑、衡量并且自负风险，因下载任何资料而导致用户电脑系统的任何损坏或资料流失，用户应负完全责任。</li>\r\n<li>用户经由本网站取得的建议和资讯，无论其形式或表现，绝不构成本协议未明示规定的任何保证。</li>\r\n<li>基于以下原因而造成的利润、商誉、使用、资料损失或其它无形损失，本网站不承担任何直接、间接、附带、特别、衍生性或惩罚性赔偿（即使本网站已被告知前款赔偿的可能性）：         \r\n<ul>\r\n<li>本网站的使用或无法使用。</li>\r\n<li>经由或通过本网站购买或取得的任何物品，或接收之信息，或进行交易所随之产生的替代物品及服务的购买成本。</li>\r\n<li>用户的传输或资料遭到未获授权的存取或变更。</li>\r\n<li>本网站中任何第三方之声明或行为。</li>\r\n<li>本网站其它相关事宜。</li>\r\n</ul>\r\n</li>\r\n<li>本网站只是为用户提供一个交易的平台，对于用户所刊登的交易物品的合法性、真实性及其品质，以及用户履行交易的能力等，本网站一律不负任何担保责任。用户如果因使用本网站，或因购买刊登于本网站的任何物品，而受有损害时，本网站不负任何补偿或赔偿责任。</li>\r\n<li>本  网站提供与其它互联网上的网站或资源的链接，用户可能会因此连结至其它运营商经营的网站，但不表示本网站与这些运营商有任何关系。其它运营商经营的网站均  由各经营者自行负责，不属于本网站控制及负责范围之内。对于存在或来源于此类网站或资源的任何内容、广告、产品或其它资料，本网站亦不予保证或负责。因使  用或依赖任何此类网站或资源发布的或经由此类网站或资源获得的任何内容、物品或服务所产生的任何损害或损失，本网站不负任何直接或间接的责任。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>八.、不可抗力</strong><br /> <br /> 因不可抗力或者其他意外事件，使得本协议的履行不可能、不必要或者无意义的，双方均不承担责任。本合同所称之不可抗力意指不能预见、不能避免并不能克服的  客观情况，包括但不限于战争、台风、水灾、火灾、雷击或地震、罢工、暴动、法定疾病、黑客攻击、网络病毒、电信部门技术管制、政府行为或任何其它自然或人  为造成的灾难等客观情况。<br /> <br /> <strong>九、争议解决方式</strong><br /></p>\r\n<ol>\r\n<li>本协议及其修订本的有效性、履行和与本协议及其修订本效力有关的所有事宜，将受中华人民共和国法律管辖，任何争议仅适用中华人民共和国法律。</li>\r\n<li>因  使用本网站服务所引起与本网站的任何争议，均应提交深圳仲裁委员会按照该会届时有效的仲裁规则进行仲裁。相关争议应单独仲裁，不得与任何其它方的争议在任  何仲裁中合并处理，该仲裁裁决是终局，对各方均有约束力。如果所涉及的争议不适于仲裁解决，用户同意一切争议由人民法院管辖。</li>\r\n</ol>', '255', '1', '1240122848');
INSERT INTO `ecm_article` VALUES ('2', 'cert_autonym', '什么是实名认证', '3', '0', '', '<p><strong>什么是实名认证？</strong></p>\r\n<p>&ldquo;认证店铺&rdquo;服务是一项对店主身份真实性识别服务。店主可以通过站内PM、电话或管理员EMail的方式 联系并申请该项认证。经过管理员审核确认了店主的真实身份，就可以开通该项认证。</p>\r\n<p>通过该认证，可以说明店主身份的真实有效性，为买家在网络交易的过程中提供一定的信心和保证。</p>\r\n<p><strong>认证申请的方式：</strong></p>\r\n<p>Email：XXXX@XX.com</p>\r\n<p>管理员：XXXXXX</p>', '255', '1', '1240122848');
INSERT INTO `ecm_article` VALUES ('3', 'cert_material', '什么是实体店铺认证', '3', '0', '', '<p><strong>什么是实体店铺认证？</strong></p>\r\n<p>&ldquo;认证店铺&rdquo;服务是一项对店主身份真实性识别服务。店主可以通过站内PM、电话或管理员EMail的方式 联系并申请该项认证。经过管理员审核确认了店主的真实身份，就可以开通该项认证。</p>\r\n<p>通过该认证，可以说明店主身份的真实有效性，为买家在网络交易的过程中提供一定的信心和保证。</p>\r\n<p><strong>认证申请的方式：</strong></p>\r\n<p>Email：XXXX@XX.com</p>\r\n<p>管理员：XXXXXX</p>', '255', '1', '1240122848');
INSERT INTO `ecm_article` VALUES ('4', 'setup_store', '开店协议', '3', '0', '', '<p>使用本公司服务所须遵守的条款和条件。<br /><br />1.用户资格<br />本公司的服务仅向适用法律下能够签订具有法律约束力的合同的个人提供并仅由其使用。在不限制前述规定的前提下，本公司的服务不向18周岁以下或被临时或无限期中止的用户提供。如您不合资格，请勿使用本公司的服务。此外，您的帐户（包括信用评价）和用户名不得向其他方转让或出售。另外，本公司保留根据其意愿中止或终止您的帐户的权利。<br /><br />2.您的资料（包括但不限于所添加的任何商品）不得：<br />*具有欺诈性、虚假、不准确或具误导性；<br />*侵犯任何第三方著作权、专利权、商标权、商业秘密或其他专有权利或发表权或隐私权；<br />*违反任何适用的法律或法规（包括但不限于有关出口管制、消费者保护、不正当竞争、刑法、反歧视或贸易惯例/公平贸易法律的法律或法规）；<br />*有侮辱或者诽谤他人，侵害他人合法权益的内容；<br />*有淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的内容；<br />*包含可能破坏、改变、删除、不利影响、秘密截取、未经授权而接触或征用任何系统、数据或个人资料的任何病毒、特洛依木马、蠕虫、定时炸弹、删除蝇、复活节彩蛋、间谍软件或其他电脑程序；<br /><br />3.违约<br />如发生以下情形，本公司可能限制您的活动、立即删除您的商品、向本公司社区发出有关您的行为的警告、发出警告通知、暂时中止、无限期地中止或终止您的用户资格及拒绝向您提供服务：<br />(a)您违反本协议或纳入本协议的文件；<br />(b)本公司无法核证或验证您向本公司提供的任何资料；<br />(c)本公司相信您的行为可能对您、本公司用户或本公司造成损失或法律责任。<br /><br />4.责任限制<br />本公司、本公司的关联公司和相关实体或本公司的供应商在任何情况下均不就因本公司的网站、本公司的服务或本协议而产生或与之有关的利润损失或任何特别、间接或后果性的损害（无论以何种方式产生，包括疏忽）承担任何责任。您同意您就您自身行为之合法性单独承担责任。您同意，本公司和本公司的所有关联公司和相关实体对本公司用户的行为的合法性及产生的任何结果不承担责任。<br /><br />5.无代理关系<br />用户和本公司是独立的合同方，本协议无意建立也没有创立任何代理、合伙、合营、雇员与雇主或特许经营关系。本公司也不对任何用户及其网上交易行为做出明示或默许的推荐、承诺或担保。<br /><br />6.一般规定<br />本协议在所有方面均受中华人民共和国法律管辖。本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</p>', '255', '1', '1240122848');
INSERT INTO `ecm_article` VALUES ('5', 'msn_privacy', 'MSN在线通隐私策略', '3', '0', '', '<p>Msn在线通隐私策略旨在说明您在本网站使用Msn在线通功能时我们如何保护您的Msn帐号信息。<br /> 我们认为隐私权非常重要。我们希望此隐私保护中心有助于您在本网站更好使用Msn在线通<br /> <strong>我们收集的信息</strong></p><blockquote>* 您在本网站激活Msn在线通时,程序将会记录您的Msn在线通帐号</blockquote><p><br /> <strong>您的选择</strong></p><blockquote>* 您可以在本网站随时注销您的Msn在线通帐号</blockquote><p><br /> <strong>其他隐私声明</strong></p><blockquote>* 如果我们需要改变本网站Msn在线通的隐私策略, 我们会把相关的改动在此页面发布.</blockquote>', '255', '1', '1240122848');
INSERT INTO `ecm_article` VALUES ('6', '', '购物保障', '-1', '3', null, '<p style=\"margin: 10px; line-height: 150%;\"><strong><span style=\"color: #0000ff;\">一、专业IT产品销售 </span></strong><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 演示店铺，专业的IT产品销售网站，包括：笔记本电脑、台式机、数码相机、摄像机、MP3、MP4、电脑散件、DIY装 机、手机、通讯设备、办公耗材、配件外设、移动存储、网络产品、各类软件等。有正规可靠的进货渠道，有专业的管理团队，有完善的网络技术平台，有经验丰富 的售后服务人员，绝对值得您信赖。<br /><br /><strong><span style=\"color: #0000ff;\">二、实体店直接供货 </span></strong><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 演示店铺下设实体店直接供货，将在全国每个城市设立一个实体店，以供当地区供货和售后服务。<br /><br /><strong><span style=\"color: #0000ff;\">三、付款安全</span></strong> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 用户可以选择财付通付款（中间信用担保）、货到付款（货运公司代收）、银行转帐、在线支付，因为卖家都是实体店商户，所以支付非常安全。<br /><br /><strong><span style=\"color: #0000ff;\">四、完善的售后服务</span></strong> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 因为所售产品都是正品行货，能在全国联保的商品，都可以全国联保；销售的商品均提供与到实体店购买一样的售后服务保障。</p>\r\n<p>&nbsp;</p>', '1', '1', '1249544249');
INSERT INTO `ecm_article` VALUES ('7', '', '系统升级通知（周二）！', '2', '0', '', '<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p>尊敬的用户，您好！</p>\r\n<p>为了给广大用户提供更好的服务，拟在 2009年 6月 6日 12:30 － 14:00 做系统升级。</p>\r\n<p>届时，页面会出现暂时不能使用的情况。</p>\r\n<p>在此，衷心的感谢每位用户一贯以来对我们工作的支持和关注。</p>', '255', '1', '1249610440');
INSERT INTO `ecm_article` VALUES ('8', '', '8月8日暂停货品出库', '2', '0', '', '<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p><span>敬爱的顾客： <br />我 们将于下2009年8月8日进行内部货品盘点和整合，当天将暂停货品的出库，但是为了广大用户能够尽量在周一收到您周六晚间和周日下午 16：00 前 生成的有效本地订单 (外环外和外地订单将在周日下午发出，具体配送时间根据订单所选的货运方式而定) ，将原有的上海外环线以内的一日二送改为一日一送的配送方式。 8月8日配送时间为上午9:00 至下午 18：00，由此为您带来的不便，还请您谅解。 届时我们将不提供上门自提，售后和送货等其他服务。 从2008年8月8日星期二起外环线以内的配送恢复为一日二送。 在此衷心的感谢各位顾客一贯以来对我们工作的支持和关注。</span></p>', '255', '1', '1249610480');
INSERT INTO `ecm_article` VALUES ('9', '', '商品评论改版升级!', '2', '0', '', '<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p>首先，为了使得大家能更充分参与，我们将逐步放开对产品评论的资格限制， 顾客可以在购买商品后对商品进行评价，其他顾客还可以对评价进行是否好评的参与，得到较多用户好评的评论将得到更多的展示机会。</p>', '255', '1', '1249610514');
INSERT INTO `ecm_article` VALUES ('10', '', '银行系统升级通告！', '2', '0', '', '<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p>敬的顾客：<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 由于银行系统将于12.10号进行升级，因此在此期间，网上支付业务将会暂停，本网站将会暂停网上支付方式的订单，对此进行通告，谢谢您一贯的支持。</p>', '255', '1', '1249610535');
INSERT INTO `ecm_article` VALUES ('11', '', '顾客必读', '4', '0', '', '<h4><br /></h4>\r\n<h4>如何订购商品？</h4>\r\n<p>您可以首先浏览我们的网站了解商品。看到您满意的商品您可以直接在我们的网站上实现订购。您也可以和我们网站的客服人员联系订购。</p>\r\n<h4>我通过网站看到你们的商品后觉得不错，但是我不是经常上网，你可以寄一些商品的图片和介绍给我吗？</h4>\r\n<p>答：我们的网站会不定期地为会员发送商品信息资料的电子邮件。如果您目前还没有成为我们的会员，您可以直接在我们的网站上注册，非常方便。</p>\r\n<h4>请告诉我在这里购物的理由好吗？</h4>\r\n<ol>\r\n<li>我们是一家拥有长期经营零售业务经验的网站；</li>\r\n<li>我们将给您带来优质的商品及更优惠的价格；</li>\r\n<li>多种付款方式以及快速的全国配送；</li>\r\n<li>人性化的退换货事宜；</li>\r\n<li>体贴入微的会员积分计划；</li>\r\n<li>所有产品为原厂正规包装；</li>\r\n</ol>\r\n<h4>你们的商品我都非常喜欢，已经购买了很多，但是有些怎么一直没货？会不会订不到？</h4>\r\n<p>由于网站顾客购买量比较大，商品随时可能断货，您可以通过网站上的&ldquo;到货通知&rdquo;按钮预定商品或直接联系我们的网站客服进行预约订购。</p>\r\n<h4>所有的产品都能够在网站上购买?</h4>\r\n<p>答：目前网站查找的都是可以订购的，但是必须是仓库中有库存的产品我们才可以与您确认。部分热销产品也可以通过我们的网站做一个预约，等到货品到后，我们会立即通过电话或者电子邮件的方式通知您来订购。</p>\r\n<h4>为什么要注册会员？</h4>\r\n<ol>\r\n<li>只有注册用户才可以在网上进行订购，享受优惠的价格。</li>\r\n<li>只有注册用户才可以登录\"会员中心\"，使用更多的会员购物功能,管理自己的资料。</li>\r\n<li>只有注册用户才可以在网上给其他注册的朋友留言。</li>\r\n<li>只有注册用户才有可能获取我们赠送的礼品。</li>\r\n</ol>\r\n<h4>忘记了密码怎么办？</h4>\r\n<p>为了保护客户利益，我们无法看到您的密码。当您忘记密码时，请登录注册页面，点击\"忘记密码\"，系统会自动将您的密码通过email告诉您，您可以登录\"会员中心\"去更改密码，以确保您的利益。</p>\r\n<h4>积分是怎么回事？有什么作用？</h4>\r\n<p>积分的高低只反映您对我们的关注和支持程度。我们的积分是通过订购商品产生的。对于高积分的客户我们会有一定的奖励，如积分兑换商品、积分抵扣价格、赠送商品,更优惠的价格购买商品等，以此回馈广大顾客。</p>', '255', '1', '1249614530');
INSERT INTO `ecm_article` VALUES ('12', '', '商品退货保障', '4', '0', '', '<h4><br /></h4>\r\n<h4>符合以下条件，可以要求换货</h4>\r\n<ol>\r\n<li>客户在收到货物时当面在送货员面前拆包检查，发现货物有质量问题的；</li>\r\n<li>实际收到货物与网站上描述的有很大的出入的。</li>\r\n</ol>\r\n<p><strong>换货流程</strong>：客户当面要求送货人员退回货物，然后与我们联系。我们会为您重新发货，货物到达时间顺延。</p>\r\n<h4>符合以下条件，可以要求退货</h4>\r\n<ol>\r\n<li>客户收到货物后两天之内，发现商品有明显的制造缺陷的；</li>\r\n<li>货物经过一次换货但仍然存在质量问题的；</li>\r\n<li>由于人为原因造成超过我们承诺到货之日5天还没收到货物的。</li>\r\n</ol>\r\n<p><strong>退货流程：</strong>客户在收到货物后两天内与我们联系，我们会在三个工作日内通过银行汇款把您的货款退回。</p>\r\n<h4>在以下情况我们有权拒绝客户的退换货要求</h4>\r\n<ol>\r\n<li>货物出现破损，但没有在收货时当场要求送货人员换货的；</li>\r\n<li>超过退换货期限的退换货要求；</li>\r\n<li>退换货物不全或者外观受损 ；</li>\r\n<li>客户发货单据丢失或者不全；</li>\r\n<li>产品并非我们提供；</li>\r\n<li>货物本身不存在质量问题的 。</li>\r\n</ol>', '255', '1', '1249614660');
INSERT INTO `ecm_article` VALUES ('13', '', '体贴的售后服务', '5', '0', '', '<p>&nbsp;</p>\r\n<p>本网站所售产品均实行三包政策，请顾客保存好有效凭证，以确保我们为您更好服务。本公司的客户除享受国家规定&ldquo;三包&rdquo;。您可以更放心地在这里购物。<br /></p>\r\n<h3>保修细则</h3>\r\n<h4>一、在本网站购买的商品，自购买日起(以到货登记为准)7日内出现性能故障，您可以选择退货、换货或修理。</h4>\r\n<ol>\r\n<li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。 </li>\r\n</ol>\r\n<h4>二、在本公司购买的商品，自购日起(以到货登记为准)15日内出现性能故障，您可以选择换货或修理。(享受15天退换货无需理由的商品，按《15天退换货无需理由细则》办理)</h4>\r\n<ol>\r\n<li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。</li>\r\n</ol>\r\n<h4>三、在本公司购买的商品，自购日起(以到货登记为准)一年之内出现非人为损坏的质量问题，本公司承诺免费保修。</h4>\r\n<ol>\r\n<li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。 </li>\r\n</ol>\r\n<h3>收费维修：</h3>\r\n<h4>一、对于人为造成的故障，本公司将采取收费维修，包括：</h4>\r\n<ol>\r\n<li>产品内部被私自拆开或其中任何部分被更替； </li>\r\n<li>商品里面的条码不清楚，无法成功判断； </li>\r\n<li>有入水、碎裂、损毁或有腐蚀等现象； </li>\r\n<li>过了保修期的商品。</li>\r\n</ol>\r\n<h4>二、符合以下条件，可以要求换货：</h4>\r\n<ol>\r\n<li>客户在收到货物时当面在送货员面前拆包检查，发现货物有质量问题的 </li>\r\n<li>实际收到货物与网站上描述的有很大的出入的 </li>\r\n<li>换货流程：客户当面要求送货人员退回货物，然后与我们联系。我们会在一个工作日内为您重新发货，货物到达时间顺延。</li>\r\n</ol>\r\n<h4>三、符合以下条件，可以要求退货：</h4>\r\n<p>客户收到货物后两天之内，</p>\r\n<ol>\r\n<li>发现商品有明显的制造缺陷的 </li>\r\n<li>货物经过一次换货但仍然存在质量问题的 </li>\r\n<li>由于人为原因造成超过我们承诺到货之日三天还没收到货物的</li>\r\n</ol>\r\n<p>退货流程：客户在收到货物后两天内与我们联系，我们会在两个工作日内通过银行汇款把您的货款退回。</p>\r\n<h4>在以下情况我们有权拒绝客户的退换货要求：</h4>\r\n<ol>\r\n<li>货物出现破损，但没有在收货时当场要求送货人员换货的 </li>\r\n<li>超过退换货期限的退换货要求 </li>\r\n<li>退换货物不全或者外观受损 </li>\r\n<li>客户发货单据丢失或者不全 </li>\r\n<li>产品并非我们提供 </li>\r\n<li>货物本身不存在质量问题的</li>\r\n</ol>', '255', '1', '1249614760');
INSERT INTO `ecm_article` VALUES ('14', '', '免责条款', '5', '0', '', '<p>&nbsp;</p>\r\n<h4>免责声明</h4>\r\n<p>如因不可抗力或其他无法控制的原因造成网站销售系统崩溃或无法正常使用，从而导致网上交易无法完成或丢失有关的信息、记录等，网站将不承担责任。但是我们将会尽合理的可能协助处理善后事宜，并努力使客户减少可能遭受的经济损失。<br />本 店可以按买方的要求代办相关运输手续，但我们的责任义务仅限于按时发货，遇到物流（邮政）意外时协助买方查询，不承担任何物流（邮政）提供给顾客之外的赔 偿，一切查询索赔事宜均按照物流（邮政）的规定办理。在物流（邮政）全程查询期限未满之前，买方不得要求赔偿。提醒买方一定核实好收货详细地址和收货人电 话，以免耽误投递。凡在本店购物，均视为如同意此声明。</p>\r\n<h4>客户监督</h4>\r\n<p>我们希望通过不懈努力，为客户提供最佳服务，我们在给客户提供服务的全程中接受客户的监督。</p>\r\n<h4>争议处理</h4>\r\n<p>如果客户与网站之间发生任何争议，可依据当时双方所认定的协议或相关法律来解决。</p>', '255', '1', '1249614798');
INSERT INTO `ecm_article` VALUES ('15', '', '简单的购物流程', '5', '0', '', '<h4><br /></h4>\r\n<h4>怎样注册？</h4>\r\n<p>答：您可以直接点击\"会员注册\"进行注册。注册很简单，您只需按注册向导的要求输入一些基本信息即可。为了准确地为您服务，请务必在注册时填写您的真实信息，我们会为您保密。输入的帐号要4-10位，仅可使用英文字母、数字\"-\"。</p>\r\n<h4>怎样成为会员?</h4>\r\n<p>答：您可以直接点击\"会员登录与注册\"进行注册。注册很简单，您只需根据系统提示输入相关资料即可，请您填写完毕时，务必核对填写内容的准确性，并谨记您的会员账号和密码，以便您查询订单或是希望网站提供予您更多的服务时用以核对您的身份。</p>\r\n<h4>如何在网上下单购买，怎么一个操作流程呢？</h4>\r\n<p>答：这种方式和您逛商场的方式十分相似，您只要按照我们的商品分类页面或进入\"钻石珠宝\"、\"个性定制\"等逐页按照连接指明的路径浏览就可以了。 一旦看中了您喜欢的商品，您可以随时点击\"放入购物篮\"按钮将它放入\"购物篮\"。随后，您可以按\"去收银台\"。我们的商品十分丰富，不过您别担心，我们在 每一页中都设立了详细明白的导航条，您是不会迷路的。</p>', '255', '1', '1249614826');

-- ----------------------------
-- Table structure for `ecm_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_attribute`;
CREATE TABLE `ecm_attribute` (
  `attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(60) NOT NULL DEFAULT '',
  `input_mode` varchar(10) NOT NULL DEFAULT 'text',
  `def_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_brand`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_brand`;
CREATE TABLE `ecm_brand` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL DEFAULT '',
  `brand_logo` varchar(255) DEFAULT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `recommended` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `if_show` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `tag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`brand_id`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_brand
-- ----------------------------
INSERT INTO `ecm_brand` VALUES ('1', '麦包包', 'data/files/mall/brand/1.gif', '1', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('2', 'ESprit', 'data/files/mall/brand/2.jpg', '2', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('3', '李宁', 'data/files/mall/brand/3.jpg', '3', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('4', 'G-Star', 'data/files/mall/brand/4.jpg', '4', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('5', 'Lee', 'data/files/mall/brand/5.jpg', '5', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('6', 'Jack & Jones', 'data/files/mall/brand/6.jpg', '6', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('7', 'DIOR', 'data/files/mall/brand/7.jpg', '6', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('8', 'Chanel', 'data/files/mall/brand/8.jpg', '7', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('9', 'PUMA', 'data/files/mall/brand/9.jpg', '8', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('10', '美特斯邦威', 'data/files/mall/brand/10.jpg', '9', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('11', 'Adidas', 'data/files/mall/brand/11.jpg', '10', '1', '0', '1', '');
INSERT INTO `ecm_brand` VALUES ('12', 'Nike', 'data/files/mall/brand/12.jpg', '11', '1', '0', '1', '');

-- ----------------------------
-- Table structure for `ecm_cart`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_cart`;
CREATE TABLE `ecm_cart` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `session_id` varchar(32) NOT NULL DEFAULT '',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(255) NOT NULL DEFAULT '',
  `spec_id` int(10) unsigned NOT NULL DEFAULT '0',
  `specification` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `goods_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_category_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_category_goods`;
CREATE TABLE `ecm_category_goods` (
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`,`goods_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_category_goods
-- ----------------------------
INSERT INTO `ecm_category_goods` VALUES ('1201', '25');
INSERT INTO `ecm_category_goods` VALUES ('1201', '28');
INSERT INTO `ecm_category_goods` VALUES ('1201', '29');
INSERT INTO `ecm_category_goods` VALUES ('1202', '4');
INSERT INTO `ecm_category_goods` VALUES ('1202', '6');
INSERT INTO `ecm_category_goods` VALUES ('1202', '10');
INSERT INTO `ecm_category_goods` VALUES ('1202', '13');
INSERT INTO `ecm_category_goods` VALUES ('1202', '18');
INSERT INTO `ecm_category_goods` VALUES ('1202', '19');
INSERT INTO `ecm_category_goods` VALUES ('1202', '21');
INSERT INTO `ecm_category_goods` VALUES ('1202', '23');
INSERT INTO `ecm_category_goods` VALUES ('1203', '1');
INSERT INTO `ecm_category_goods` VALUES ('1203', '3');
INSERT INTO `ecm_category_goods` VALUES ('1203', '7');
INSERT INTO `ecm_category_goods` VALUES ('1203', '9');
INSERT INTO `ecm_category_goods` VALUES ('1203', '14');
INSERT INTO `ecm_category_goods` VALUES ('1203', '17');
INSERT INTO `ecm_category_goods` VALUES ('1203', '20');
INSERT INTO `ecm_category_goods` VALUES ('1203', '22');
INSERT INTO `ecm_category_goods` VALUES ('1203', '26');
INSERT INTO `ecm_category_goods` VALUES ('1203', '27');
INSERT INTO `ecm_category_goods` VALUES ('1209', '2');
INSERT INTO `ecm_category_goods` VALUES ('1209', '5');
INSERT INTO `ecm_category_goods` VALUES ('1209', '8');
INSERT INTO `ecm_category_goods` VALUES ('1209', '11');
INSERT INTO `ecm_category_goods` VALUES ('1209', '12');
INSERT INTO `ecm_category_goods` VALUES ('1209', '15');
INSERT INTO `ecm_category_goods` VALUES ('1209', '16');
INSERT INTO `ecm_category_goods` VALUES ('1209', '24');

-- ----------------------------
-- Table structure for `ecm_category_store`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_category_store`;
CREATE TABLE `ecm_category_store` (
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`,`store_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_category_store
-- ----------------------------
INSERT INTO `ecm_category_store` VALUES ('2', '3');
INSERT INTO `ecm_category_store` VALUES ('3', '2');

-- ----------------------------
-- Table structure for `ecm_collect`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_collect`;
CREATE TABLE `ecm_collect` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'goods',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `keyword` varchar(60) DEFAULT NULL,
  `add_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`,`type`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_collect
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_coupon`;
CREATE TABLE `ecm_coupon` (
  `coupon_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `coupon_name` varchar(100) NOT NULL DEFAULT '',
  `coupon_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `use_times` int(10) unsigned NOT NULL DEFAULT '0',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `min_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `if_issue` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`coupon_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_coupon_sn`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_coupon_sn`;
CREATE TABLE `ecm_coupon_sn` (
  `coupon_sn` varchar(20) NOT NULL,
  `coupon_id` int(10) unsigned NOT NULL DEFAULT '0',
  `remain_times` int(10) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`coupon_sn`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_coupon_sn
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_friend`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_friend`;
CREATE TABLE `ecm_friend` (
  `owner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `friend_id` int(10) unsigned NOT NULL DEFAULT '0',
  `add_time` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`owner_id`,`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_friend
-- ----------------------------
INSERT INTO `ecm_friend` VALUES ('4', '3', '1249545996');

-- ----------------------------
-- Table structure for `ecm_function`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_function`;
CREATE TABLE `ecm_function` (
  `func_code` varchar(20) NOT NULL DEFAULT '',
  `func_name` varchar(60) NOT NULL DEFAULT '',
  `privileges` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`func_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_function
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_gcategory`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_gcategory`;
CREATE TABLE `ecm_gcategory` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cate_id`),
  KEY `store_id` (`store_id`,`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1210 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_gcategory
-- ----------------------------
INSERT INTO `ecm_gcategory` VALUES ('1', '0', '男装', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('2', '0', 'T恤', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('3', '0', 'Polo衫', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('4', '0', '卫衣', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('5', '0', '衬衫', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('6', '0', '牛仔裤', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('7', '0', '休闲裤', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('8', '0', '西裤', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('9', '0', '皮裤', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('10', '0', '风衣', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('11', '0', '棉衣', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('12', '0', '皮衣', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('13', '0', '羽绒服', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('14', '0', '西服', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('15', '0', '夹克', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('16', '0', '西服套装', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('17', '0', '背心', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('18', '0', '毛衣', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('19', '0', '民族服装', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('20', '0', '工装制服', '1', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('21', '0', '女装/女士精品', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('22', '0', '风衣/长大衣', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('23', '0', '羽绒服', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('24', '0', '棉衣/棉服', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('25', '0', '毛衣', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('26', '0', '超短外套', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('27', '0', '针织衫', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('28', '0', 'T恤', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('29', '0', '卫衣/绒衫', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('30', '0', '半身裙', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('31', '0', '小西装', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('32', '0', '裤子', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('33', '0', '衬衫', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('34', '0', '短外套', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('35', '0', '中老年服装', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('36', '0', '连衣裙', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('37', '0', '牛仔裤', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('38', '0', '蕾丝衫/雪纺衫', '21', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('57', '0', '男女内衣/家居服', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('58', '0', '文胸', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('59', '0', '文胸套装', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('60', '0', '女士内裤', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('61', '0', '男士内裤', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('62', '0', '塑身内衣', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('63', '0', '保暖内衣', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('64', '0', '睡衣', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('65', '0', '吊带/背心', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('66', '0', '情侣内衣', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('67', '0', '隐形胸罩', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('68', '0', '抹胸', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('69', '0', '袜子', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('70', '0', '肚兜', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('71', '0', '胸垫/胸贴/肩带/吊袜带', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('72', '0', '其它内衣款式', '57', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('73', '0', '运动服/颈环配件', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('74', '0', 'T恤', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('75', '0', '长袖休闲T恤', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('76', '0', '长袖排汗T恤', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('77', '0', '短袖休闲T恤', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('78', '0', '短袖排汗T恤', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('79', '0', '背心/无袖', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('80', '0', 'POLO衫', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('81', '0', '吊带', '74', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('82', '0', '运动套装', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('83', '0', '冬季套装', '82', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('84', '0', '夏季套装', '82', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('85', '0', '春秋套装', '82', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('86', '0', '外套', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('87', '0', '卫衣', '86', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('88', '0', '风衣', '86', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('89', '0', '绒衣', '86', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('90', '0', '棉衣', '86', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('91', '0', '羽绒衣', '86', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('92', '0', '毛衣/针织', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('93', '0', '运动裤/裙', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('94', '0', '长裤', '93', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('95', '0', '中裤', '93', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('96', '0', '短裤', '93', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('97', '0', '七分/九分裤', '93', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('98', '0', '运动裙', '93', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('99', '0', '马甲', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('100', '0', '夹克', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('101', '0', '运动配件', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('102', '0', '运动袜', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('103', '0', '运动眼镜', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('104', '0', '运动手套', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('105', '0', '运动手表', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('106', '0', '运动水壶', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('107', '0', '运动毛巾', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('108', '0', '其他运动配件', '101', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('109', '0', '运动包袋', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('110', '0', '单肩包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('111', '0', '旅行包/箱', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('112', '0', '钱包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('113', '0', '手提包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('114', '0', '双肩包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('115', '0', '桶包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('116', '0', '腰包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('117', '0', '其他运动包', '109', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('118', '0', '运动颈环/手环', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('119', '0', '运动护具', '73', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('120', '0', '头带', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('121', '0', '护腕', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('122', '0', '护肘', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('123', '0', '护膝', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('124', '0', '护腿板', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('125', '0', '护踝', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('126', '0', '手套', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('127', '0', '头盔', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('128', '0', '护头', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('129', '0', '护肩', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('130', '0', '护手', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('131', '0', '护腰', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('132', '0', '护具套件', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('133', '0', '其它', '119', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('134', '0', '服饰配件/帽子/围巾', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('135', '0', '皮带', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('136', '0', '腰带/腰链/腰饰', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('137', '0', '帽子', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('138', '0', '围巾/丝巾/披肩', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('139', '0', '领带', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('140', '0', '领结', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('141', '0', '领带夹', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('142', '0', '头巾', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('143', '0', '袖扣', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('144', '0', '背带', '134', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('162', '0', '流行男鞋', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('163', '0', '休闲鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('164', '0', '皮鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('165', '0', '靴子', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('166', '0', '帆布鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('167', '0', '凉鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('168', '0', '凉拖', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('169', '0', '增高鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('170', '0', '功能鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('171', '0', '编织鞋/布鞋/手工鞋', '162', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('172', '0', '女鞋', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('173', '0', '单鞋(露脚背)', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('174', '0', '靴子', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('175', '0', '雪地靴', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('176', '0', '凉鞋', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('177', '0', '凉拖', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('178', '0', '休闲球鞋(不露脚背)', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('179', '0', '休闲皮鞋(不露脚背)', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('180', '0', '帆布鞋', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('181', '0', '雨鞋/靴', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('182', '0', '绣花鞋', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('183', '0', '布鞋/手工鞋', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('184', '0', '内增高鞋', '172', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('185', '0', '运动鞋', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('186', '0', '篮球鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('187', '0', '跑步鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('188', '0', '足球鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('189', '0', '网球鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('190', '0', '羽毛球鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('191', '0', '全能鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('192', '0', '经典收藏鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('193', '0', '休闲鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('194', '0', '复古鞋/板鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('195', '0', '攀岩', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('196', '0', '运动凉鞋/沙滩鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('197', '0', '排球鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('198', '0', '帆布鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('199', '0', '乒乓球鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('200', '0', '溜冰鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('201', '0', '情侣休闲鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('202', '0', '训练鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('203', '0', '运动拖鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('204', '0', '专业健身鞋', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('205', '0', '其它', '185', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('206', '0', '箱包皮具/女包/男包', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('207', '0', '女用单肩包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('208', '0', '女用斜挎包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('209', '0', '女用多功能包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('210', '0', '手提包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('211', '0', '男用单肩包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('212', '0', '男用手包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('213', '0', '男用多功能包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('214', '0', '钱包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('215', '0', '双肩背包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('216', '0', '旅行包/拉杆', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('217', '0', '腰包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('218', '0', '胸包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('219', '0', '文件包/公文', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('220', '0', '配件小包/女用手包/硬币包', '206', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('221', '0', '品牌手表/流行手表', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('222', '0', '男表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('223', '0', '女表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('224', '0', '中性表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('225', '0', '对表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('226', '0', '怀表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('227', '0', '古董表/收藏表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('228', '0', '其他手表', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('229', '0', '手表配件', '221', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('230', '0', 'zippo/瑞士军刀/眼镜', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('231', '0', 'ZIPPO/芝宝', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('232', '0', '品牌打火机/其它打火机', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('233', '0', '瑞士军刀', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('234', '0', '礼品刀具', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('235', '0', '眼镜架', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('236', '0', '眼镜片', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('237', '0', '框架眼镜', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('238', '0', '太阳眼镜', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('239', '0', '功能眼镜', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('240', '0', '游泳镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('241', '0', '潜水镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('242', '0', '司机镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('243', '0', '滑雪镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('244', '0', '电脑护目镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('245', '0', '夜视镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('246', '0', '近视镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('247', '0', '老花镜', '239', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('248', '0', '眼镜配件、护理剂', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('249', '0', '镜盒/镜袋/镜套', '248', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('250', '0', '镜布', '248', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('251', '0', '隐形眼镜伴侣盒', '248', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('252', '0', '隐形眼镜清洁器', '248', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('253', '0', '眼镜护理剂', '248', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('254', '0', '滴眼液、护眼用品', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('255', '0', '烟具', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('256', '0', '烟斗', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('257', '0', '烟嘴', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('258', '0', '烟斗架', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('259', '0', '烟盒', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('260', '0', '烟斗相关配件', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('261', '0', '压棒及相关工具', '260', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('262', '0', '烟刀', '260', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('263', '0', '烟斗包', '260', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('264', '0', '烟斗清洁用品', '260', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('265', '0', '通条', '260', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('266', '0', '戒烟产品', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('267', '0', '雪茄剪/刀', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('268', '0', '火柴', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('269', '0', '卷烟器', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('270', '0', '其它', '255', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('271', '0', '酒具', '230', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('272', '0', '饰品/流行首饰/时尚饰品', '0', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('273', '0', '项链/项坠', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('274', '0', '手链/手镯/脚链', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('275', '0', '戒指/指环', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('276', '0', '耳饰', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('277', '0', '胸针/领针', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('278', '0', '情侣对', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('279', '0', '首饰套装', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('280', '0', '发饰', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('281', '0', '摆件', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('282', '0', '裸石/半成品', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('283', '0', '体环', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('284', '0', 'DIY饰品/配件/散珠', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('285', '0', '首饰保养/鉴定用品/首饰盒', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('286', '0', '其它款式', '272', '255', '1');
INSERT INTO `ecm_gcategory` VALUES ('1200', '3', '韩版女装', '0', '1', '1');
INSERT INTO `ecm_gcategory` VALUES ('1201', '3', '外套', '1200', '1', '1');
INSERT INTO `ecm_gcategory` VALUES ('1202', '3', '长裙', '1200', '2', '1');
INSERT INTO `ecm_gcategory` VALUES ('1203', '3', '女裤', '1200', '3', '1');
INSERT INTO `ecm_gcategory` VALUES ('1204', '3', '包包', '0', '2', '1');
INSERT INTO `ecm_gcategory` VALUES ('1205', '3', '手提包', '1204', '1', '1');
INSERT INTO `ecm_gcategory` VALUES ('1206', '3', '皮夹钱包', '1204', '2', '1');
INSERT INTO `ecm_gcategory` VALUES ('1207', '3', '时尚女鞋', '0', '3', '1');
INSERT INTO `ecm_gcategory` VALUES ('1208', '3', '气质单鞋', '1207', '1', '1');
INSERT INTO `ecm_gcategory` VALUES ('1209', '3', '运动休闲', '1207', '2', '1');

-- ----------------------------
-- Table structure for `ecm_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_goods`;
CREATE TABLE `ecm_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'material',
  `goods_name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_name` varchar(255) NOT NULL DEFAULT '',
  `brand` varchar(100) NOT NULL,
  `spec_qty` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `spec_name_1` varchar(60) NOT NULL DEFAULT '',
  `spec_name_2` varchar(60) NOT NULL DEFAULT '',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `closed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `close_reason` varchar(255) DEFAULT NULL,
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  `default_spec` int(11) unsigned NOT NULL DEFAULT '0',
  `default_image` varchar(255) NOT NULL DEFAULT '',
  `recommended` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `cate_id_1` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id_2` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id_3` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id_4` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tags` varchar(102) NOT NULL,
  PRIMARY KEY (`goods_id`),
  KEY `store_id` (`store_id`),
  KEY `cate_id` (`cate_id`),
  KEY `cate_id_1` (`cate_id_1`),
  KEY `cate_id_2` (`cate_id_2`),
  KEY `cate_id_3` (`cate_id_3`),
  KEY `cate_id_4` (`cate_id_4`),
  KEY `brand` (`brand`(10)),
  KEY `tags` (`tags`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_goods
-- ----------------------------
INSERT INTO `ecm_goods` VALUES ('1', '3', 'material', '多彩人生多彩裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/35a.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/35b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/35c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/35d.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/35e.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '2', '颜色', '尺码', '1', '0', null, '1249547077', '1249547077', '1', 'data/files/store_2/goods_179/small_200908060822598478.jpg', '1', '21', '32', '0', '0', '99.00', '');
INSERT INTO `ecm_goods` VALUES ('2', '3', 'material', '花色高邦运动鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0026.gif\" alt=\"\" /></p>\r\n<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0027.jpg\" alt=\"\" /></p>\r\n<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0028.jpg\" alt=\"\" /></p>', '178', '女鞋	休闲球鞋(不露脚背)', 'G-Star', '2', '颜色', '尺码', '1', '0', null, '1249547390', '1249547390', '4', 'data/files/store_2/goods_131/small_200908060828517782.jpg', '1', '172', '178', '0', '0', '188.00', '');
INSERT INTO `ecm_goods` VALUES ('3', '3', 'material', '09新款职业女裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/34a.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/34b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/34c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/34d.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '0', '', '', '1', '0', null, '1249547562', '1249547562', '8', 'data/files/store_2/goods_107/small_200908060831473107.jpg', '1', '21', '32', '0', '0', '238.00', '');
INSERT INTO `ecm_goods` VALUES ('4', '3', 'material', '09新款韩版淑连衣裙', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/24.jpg\" alt=\"\" /></div>', '36', '女装/女士精品	连衣裙', 'Lee', '0', '', '', '1', '0', null, '1249547772', '1249547772', '9', 'data/files/store_2/goods_66/small_200908060834263919.jpg', '1', '21', '36', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('5', '3', 'material', '2009耐克新款运动鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0025.jpg\" alt=\"\" /></p>', '191', '运动鞋	全能鞋', 'Nike', '2', '颜色', '尺码', '1', '0', null, '1249547890', '1249547960', '11', 'data/files/store_2/goods_70/small_200908060837502713.jpg', '1', '185', '191', '0', '0', '688.00', '');
INSERT INTO `ecm_goods` VALUES ('6', '3', 'material', '包邮韩版经典长袖雪纺下摆针织连衣裙', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/23.jpg\" alt=\"\" /></div>', '36', '女装/女士精品	连衣裙', 'Nike', '0', '', '', '1', '0', null, '1249548137', '1249548137', '15', 'data/files/store_2/goods_95/small_200908060841358079.jpg', '1', '21', '36', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('7', '3', 'material', '09春款专柜正品奢华系列9分裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/36a.jpg\" alt=\"\" /><br /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/36c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/36d.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprite', '2', '颜色', '尺码', '1', '0', null, '1249549645', '1249549645', '16', 'data/files/store_2/goods_186/small_200908060906263554.jpg', '1', '21', '32', '0', '0', '178.00', '');
INSERT INTO `ecm_goods` VALUES ('8', '3', 'material', '彪马精品练功鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0024.jpg\" alt=\"\" /></p>\r\n<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0023.jpg\" alt=\"\" /></p>', '193', '运动鞋	休闲鞋', 'PUM', '2', '颜色', '尺码', '1', '0', null, '1249549693', '1249549816', '19', 'data/files/store_2/goods_187/small_200908060909472569.jpg', '1', '185', '193', '0', '0', '368.00', '');
INSERT INTO `ecm_goods` VALUES ('9', '3', 'material', '新女性职业长裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/32a.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/32b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/32c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/32d.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/32e.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '0', '', '', '1', '0', null, '1249549936', '1249549936', '25', 'data/files/store_2/goods_98/small_200908060911381037.jpg', '1', '21', '32', '0', '0', '168.00', '');
INSERT INTO `ecm_goods` VALUES ('10', '3', 'material', '家居横纹休闲长裙', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/22.jpg\" alt=\"\" /></div>', '30', '女装/女士精品	半身裙', 'G-Star', '2', '颜色', '尺码', '1', '0', null, '1249550129', '1249550129', '26', 'data/files/store_2/goods_69/small_200908060914291406.jpg', '1', '21', '30', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('11', '3', 'material', '耐克红粉世家运动鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0022.gif\" alt=\"\" /></p>', '178', '女鞋	休闲球鞋(不露脚背)', 'Nike', '2', '颜色', '尺码', '1', '0', null, '1249550246', '1249550246', '30', 'data/files/store_2/goods_33/small_200908060917132087.jpg', '1', '172', '178', '0', '0', '268.00', '');
INSERT INTO `ecm_goods` VALUES ('12', '3', 'material', '09新款飞腾运动鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0020.jpg\" alt=\"\" /></p>\r\n<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0021.jpg\" alt=\"\" /></p>', '187', '运动鞋	跑步鞋', 'PUMA', '0', '', '', '1', '0', null, '1249550348', '1249550348', '34', 'data/files/store_2/goods_123/small_200908060918436837.jpg', '1', '185', '187', '0', '0', '268.00', '');
INSERT INTO `ecm_goods` VALUES ('13', '3', 'material', '秀族09新款韩版淑女七分袖针织雪纺连衣裙', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/21.jpg\" alt=\"\" /></div>', '21', '女装/女士精品', 'DIOR', '0', '', '', '1', '0', null, '1249550465', '1249550465', '35', 'data/files/store_2/goods_24/small_200908060920245196.jpg', '1', '21', '0', '0', '0', '179.00', '');
INSERT INTO `ecm_goods` VALUES ('14', '3', 'material', '春款彩色格纹系列牛仔小脚裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/37a.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/37b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/37c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/37d.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '0', '', '', '1', '0', null, '1249550608', '1249550637', '37', 'data/files/store_2/goods_128/small_200908060922084636.jpg', '1', '21', '32', '0', '0', '125.00', '');
INSERT INTO `ecm_goods` VALUES ('15', '3', 'material', '耐克混色女式篮球鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0019.jpg\" alt=\"\" /></p>', '178', '女鞋	休闲球鞋(不露脚背)', 'Nike', '2', '颜色', '尺码', '1', '0', null, '1249550754', '1249550754', '38', 'data/files/store_2/goods_147/small_200908060925471585.jpg', '1', '172', '178', '0', '0', '578.00', '');
INSERT INTO `ecm_goods` VALUES ('16', '3', 'material', '横纹方格运动鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0018.jpg\" alt=\"\" /></p>', '178', '女鞋	休闲球鞋(不露脚背)', '李宁', '2', '颜色', '尺码', '1', '0', null, '1249550876', '1249550876', '42', 'data/files/store_2/goods_67/small_200908060927474675.jpg', '1', '172', '178', '0', '0', '128.00', '');
INSERT INTO `ecm_goods` VALUES ('17', '3', 'material', '韩E族百搭修身紧腰休闲长裤【灰色】', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/30a.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/30b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/30c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/30d.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '0', '', '', '1', '0', null, '1249551261', '1249552157', '55', 'data/files/store_2/goods_121/small_200908060932011437.jpg', '1', '21', '32', '0', '0', '90.00', '');
INSERT INTO `ecm_goods` VALUES ('18', '3', 'material', '春针织淑女连衣裙女装', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/20.jpg\" alt=\"\" /></div>', '30', '女装/女士精品	半身裙', 'Jack & Jones', '0', '', '', '1', '0', null, '1249551437', '1249551437', '47', 'data/files/store_2/goods_195/small_200908060936352784.jpg', '1', '21', '30', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('19', '3', 'material', '罗衣OL气质真丝雪纺百褶裙针织背心裙', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/19.jpg\" alt=\"\" /></div>', '30', '女装/女士精品	半身裙', '美特斯邦威', '0', '', '', '1', '0', null, '1249551552', '1249551552', '48', 'data/files/store_2/goods_109/small_200908060938292631.jpg', '1', '21', '30', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('20', '3', 'material', '小脚牛仔铅笔裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/29a.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/29b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/29c.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/29d.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/29e.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '2', '颜色', '尺码', '1', '0', null, '1249551779', '1249551779', '49', 'data/files/store_2/goods_143/small_200908060942233830.jpg', '1', '21', '32', '0', '0', '129.00', '');
INSERT INTO `ecm_goods` VALUES ('21', '3', 'material', '09春季新款简约大方高雅修身针织连衣裙983配腰带', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/18.jpg\" alt=\"\" /></div>', '30', '女装/女士精品	半身裙', 'Adidas', '0', '', '', '1', '0', null, '1249552281', '1249552281', '56', 'data/files/store_2/goods_25/small_200908060950258122.jpg', '1', '21', '30', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('22', '3', 'material', '新款多用型穿珠运动长裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/38a.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/38b.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/38c.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/38d.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '0', '', '', '1', '0', null, '1249552384', '1249552384', '57', 'data/files/store_2/goods_147/small_200908060952274906.jpg', '1', '21', '32', '0', '0', '111.00', '');
INSERT INTO `ecm_goods` VALUES ('23', '3', 'material', '韩.春.搭.闲.优雅修身精致荡领针织连衣裙/配皮带', '<p><img src=\"http://pic.shopex.cn/pictures/goodsdetail/17.jpg\" alt=\"\" /></p>', '30', '女装/女士精品	半身裙', '', '0', '', '', '1', '0', null, '1249552499', '1249552499', '58', 'data/files/store_2/goods_64/small_200908060954245662.jpg', '1', '21', '30', '0', '0', '170.00', '');
INSERT INTO `ecm_goods` VALUES ('24', '3', 'material', '阿迪达斯花式运动鞋', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/danson0017.jpg\" alt=\"\" /></p>', '178', '女鞋	休闲球鞋(不露脚背)', 'Adidas', '2', '颜色', '尺码', '1', '0', null, '1249552624', '1249552624', '59', 'data/files/store_2/goods_20/small_200908060957002218.jpg', '1', '172', '178', '0', '0', '169.00', '');
INSERT INTO `ecm_goods` VALUES ('25', '3', 'material', '春款韩版卡其休闲上衣', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/15.jpg\" alt=\"\" /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/16.jpg\" alt=\"\" /></div>', '26', '女装/女士精品	超短外套', 'Chanel', '2', '颜色', '尺码', '1', '0', null, '1249552779', '1249552779', '63', 'data/files/store_2/goods_139/small_200908060958592106.jpg', '1', '21', '26', '0', '0', '128.00', '');
INSERT INTO `ecm_goods` VALUES ('26', '3', 'material', '喜皮风格牛仔短裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/39a.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/39b.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/39c.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/39d.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '0', '', '', '1', '0', null, '1249552900', '1249552900', '67', 'data/files/store_2/goods_47/small_200908061000474424.jpg', '1', '21', '32', '0', '0', '89.00', '');
INSERT INTO `ecm_goods` VALUES ('27', '3', 'material', '春季尼龙休闲裤', '<p align=\"center\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/26a.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/26b.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/26c.jpg\" alt=\"\" /> <br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/26d.jpg\" alt=\"\" /><br /><img src=\"http://pic.shopex.cn/pictures/goodsdetail/26e.jpg\" alt=\"\" /></p>', '32', '女装/女士精品	裤子', 'ESprit', '2', '颜色', '尺码', '1', '0', null, '1249553044', '1249553044', '68', 'data/files/store_2/goods_5/small_200908061003253339.jpg', '1', '21', '32', '0', '0', '288.00', '');
INSERT INTO `ecm_goods` VALUES ('28', '3', 'material', '欧美精贵密码七分袖名媛洋装款水钻圆领绸缎小外套', '<div style=\"text-align: center;\"><img src=\"http://pic.shopex.cn/pictures/goodsdetail/14.jpg\" alt=\"\" /></div>', '26', '女装/女士精品	超短外套', '美特斯邦威', '0', '', '', '1', '0', null, '1249553192', '1249553238', '73', 'data/files/store_2/goods_115/small_200908061005154170.jpg', '1', '21', '26', '0', '0', '188.00', '');
INSERT INTO `ecm_goods` VALUES ('29', '3', 'material', '夹克.韩版新款09开衫小外套卫衣短甜美显瘦春装', '<p><img src=\"http://pic.shopex.cn/pictures/goodsdetail/13.jpg\" alt=\"\" /></p>', '22', '女装/女士精品	风衣/长大衣', 'PUMA', '0', '', '', '1', '0', null, '1249553354', '1249553354', '74', 'data/files/store_2/goods_121/small_200908061008412008.jpg', '1', '21', '22', '0', '0', '328.00', '');
INSERT INTO `ecm_goods` VALUES ('30', '2', 'material', '测试测试测试', '<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>\r\n<h2>标签</h2>', '4', '男装	卫衣', '测试品牌', '0', '', '', '1', '0', null, '1438754213', '1438754213', '75', '', '1', '1', '4', '0', '0', '100.00', ',测试标签,');

-- ----------------------------
-- Table structure for `ecm_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_goods_attr`;
CREATE TABLE `ecm_goods_attr` (
  `gattr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `attr_name` varchar(60) NOT NULL DEFAULT '',
  `attr_value` varchar(255) NOT NULL DEFAULT '',
  `attr_id` int(10) unsigned DEFAULT NULL,
  `sort_order` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`gattr_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_goods_image`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_goods_image`;
CREATE TABLE `ecm_goods_image` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `file_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_goods_image
-- ----------------------------
INSERT INTO `ecm_goods_image` VALUES ('1', '1', 'data/files/store_2/goods_179/200908060822598478.jpg', 'data/files/store_2/goods_179/small_200908060822598478.jpg', '255', '3');
INSERT INTO `ecm_goods_image` VALUES ('2', '1', 'data/files/store_2/goods_197/200908060823178267.jpg', 'data/files/store_2/goods_197/small_200908060823178267.jpg', '255', '4');
INSERT INTO `ecm_goods_image` VALUES ('3', '1', 'data/files/store_2/goods_9/200908060823294001.jpg', 'data/files/store_2/goods_9/small_200908060823294001.jpg', '255', '5');
INSERT INTO `ecm_goods_image` VALUES ('4', '1', 'data/files/store_2/goods_25/200908060823452419.jpg', 'data/files/store_2/goods_25/small_200908060823452419.jpg', '255', '6');
INSERT INTO `ecm_goods_image` VALUES ('5', '1', 'data/files/store_2/goods_32/200908060823523184.jpg', 'data/files/store_2/goods_32/small_200908060823523184.jpg', '255', '7');
INSERT INTO `ecm_goods_image` VALUES ('6', '1', 'data/files/store_2/goods_43/200908060824034431.jpg', 'data/files/store_2/goods_43/small_200908060824034431.jpg', '255', '8');
INSERT INTO `ecm_goods_image` VALUES ('7', '2', 'data/files/store_2/goods_131/200908060828517782.jpg', 'data/files/store_2/goods_131/small_200908060828517782.jpg', '255', '9');
INSERT INTO `ecm_goods_image` VALUES ('8', '2', 'data/files/store_2/goods_150/200908060829102798.jpg', 'data/files/store_2/goods_150/small_200908060829102798.jpg', '255', '10');
INSERT INTO `ecm_goods_image` VALUES ('9', '2', 'data/files/store_2/goods_170/200908060829308411.jpg', 'data/files/store_2/goods_170/small_200908060829308411.jpg', '255', '11');
INSERT INTO `ecm_goods_image` VALUES ('10', '3', 'data/files/store_2/goods_107/200908060831473107.jpg', 'data/files/store_2/goods_107/small_200908060831473107.jpg', '255', '12');
INSERT INTO `ecm_goods_image` VALUES ('11', '3', 'data/files/store_2/goods_115/200908060831559591.jpg', 'data/files/store_2/goods_115/small_200908060831559591.jpg', '255', '13');
INSERT INTO `ecm_goods_image` VALUES ('12', '3', 'data/files/store_2/goods_140/200908060832202677.jpg', 'data/files/store_2/goods_140/small_200908060832202677.jpg', '255', '14');
INSERT INTO `ecm_goods_image` VALUES ('13', '3', 'data/files/store_2/goods_147/200908060832272714.jpg', 'data/files/store_2/goods_147/small_200908060832272714.jpg', '255', '15');
INSERT INTO `ecm_goods_image` VALUES ('14', '4', 'data/files/store_2/goods_66/200908060834263919.jpg', 'data/files/store_2/goods_66/small_200908060834263919.jpg', '255', '16');
INSERT INTO `ecm_goods_image` VALUES ('15', '4', 'data/files/store_2/goods_87/200908060834479577.jpg', 'data/files/store_2/goods_87/small_200908060834479577.jpg', '255', '17');
INSERT INTO `ecm_goods_image` VALUES ('16', '4', 'data/files/store_2/goods_105/200908060835054315.jpg', 'data/files/store_2/goods_105/small_200908060835054315.jpg', '255', '18');
INSERT INTO `ecm_goods_image` VALUES ('17', '4', 'data/files/store_2/goods_125/200908060835258625.jpg', 'data/files/store_2/goods_125/small_200908060835258625.jpg', '255', '19');
INSERT INTO `ecm_goods_image` VALUES ('18', '4', 'data/files/store_2/goods_141/200908060835411590.jpg', 'data/files/store_2/goods_141/small_200908060835411590.jpg', '255', '20');
INSERT INTO `ecm_goods_image` VALUES ('19', '4', 'data/files/store_2/goods_155/200908060835558086.jpg', 'data/files/store_2/goods_155/small_200908060835558086.jpg', '255', '21');
INSERT INTO `ecm_goods_image` VALUES ('20', '5', 'data/files/store_2/goods_70/200908060837502713.jpg', 'data/files/store_2/goods_70/small_200908060837502713.jpg', '255', '22');
INSERT INTO `ecm_goods_image` VALUES ('21', '6', 'data/files/store_2/goods_95/200908060841358079.jpg', 'data/files/store_2/goods_95/small_200908060841358079.jpg', '255', '23');
INSERT INTO `ecm_goods_image` VALUES ('22', '6', 'data/files/store_2/goods_108/200908060841484621.jpg', 'data/files/store_2/goods_108/small_200908060841484621.jpg', '255', '24');
INSERT INTO `ecm_goods_image` VALUES ('23', '6', 'data/files/store_2/goods_124/200908060842042302.jpg', 'data/files/store_2/goods_124/small_200908060842042302.jpg', '255', '25');
INSERT INTO `ecm_goods_image` VALUES ('24', '7', 'data/files/store_2/goods_186/200908060906263554.jpg', 'data/files/store_2/goods_186/small_200908060906263554.jpg', '255', '26');
INSERT INTO `ecm_goods_image` VALUES ('25', '7', 'data/files/store_2/goods_13/200908060906532764.jpg', 'data/files/store_2/goods_13/small_200908060906532764.jpg', '255', '27');
INSERT INTO `ecm_goods_image` VALUES ('26', '7', 'data/files/store_2/goods_36/200908060907164774.jpg', 'data/files/store_2/goods_36/small_200908060907164774.jpg', '255', '28');
INSERT INTO `ecm_goods_image` VALUES ('27', '8', 'data/files/store_2/goods_187/200908060909472569.jpg', 'data/files/store_2/goods_187/small_200908060909472569.jpg', '255', '29');
INSERT INTO `ecm_goods_image` VALUES ('28', '8', 'data/files/store_2/goods_2/200908060910023266.jpg', 'data/files/store_2/goods_2/small_200908060910023266.jpg', '255', '30');
INSERT INTO `ecm_goods_image` VALUES ('29', '9', 'data/files/store_2/goods_98/200908060911381037.jpg', 'data/files/store_2/goods_98/small_200908060911381037.jpg', '255', '31');
INSERT INTO `ecm_goods_image` VALUES ('30', '9', 'data/files/store_2/goods_128/200908060912082754.jpg', 'data/files/store_2/goods_128/small_200908060912082754.jpg', '255', '32');
INSERT INTO `ecm_goods_image` VALUES ('31', '10', 'data/files/store_2/goods_69/200908060914291406.jpg', 'data/files/store_2/goods_69/small_200908060914291406.jpg', '255', '33');
INSERT INTO `ecm_goods_image` VALUES ('32', '10', 'data/files/store_2/goods_82/200908060914426191.jpg', 'data/files/store_2/goods_82/small_200908060914426191.jpg', '255', '34');
INSERT INTO `ecm_goods_image` VALUES ('33', '10', 'data/files/store_2/goods_94/200908060914542008.jpg', 'data/files/store_2/goods_94/small_200908060914542008.jpg', '255', '35');
INSERT INTO `ecm_goods_image` VALUES ('34', '10', 'data/files/store_2/goods_126/200908060915269026.jpg', 'data/files/store_2/goods_126/small_200908060915269026.jpg', '255', '36');
INSERT INTO `ecm_goods_image` VALUES ('35', '11', 'data/files/store_2/goods_33/200908060917132087.jpg', 'data/files/store_2/goods_33/small_200908060917132087.jpg', '255', '37');
INSERT INTO `ecm_goods_image` VALUES ('36', '12', 'data/files/store_2/goods_123/200908060918436837.jpg', 'data/files/store_2/goods_123/small_200908060918436837.jpg', '255', '38');
INSERT INTO `ecm_goods_image` VALUES ('37', '12', 'data/files/store_2/goods_142/200908060919027810.jpg', 'data/files/store_2/goods_142/small_200908060919027810.jpg', '255', '39');
INSERT INTO `ecm_goods_image` VALUES ('38', '13', 'data/files/store_2/goods_24/200908060920245196.jpg', 'data/files/store_2/goods_24/small_200908060920245196.jpg', '255', '40');
INSERT INTO `ecm_goods_image` VALUES ('39', '13', 'data/files/store_2/goods_43/200908060920437979.jpg', 'data/files/store_2/goods_43/small_200908060920437979.jpg', '255', '41');
INSERT INTO `ecm_goods_image` VALUES ('40', '13', 'data/files/store_2/goods_54/200908060920546675.jpg', 'data/files/store_2/goods_54/small_200908060920546675.jpg', '255', '42');
INSERT INTO `ecm_goods_image` VALUES ('41', '14', 'data/files/store_2/goods_128/200908060922084636.jpg', 'data/files/store_2/goods_128/small_200908060922084636.jpg', '255', '43');
INSERT INTO `ecm_goods_image` VALUES ('42', '14', 'data/files/store_2/goods_141/200908060922218002.jpg', 'data/files/store_2/goods_141/small_200908060922218002.jpg', '255', '44');
INSERT INTO `ecm_goods_image` VALUES ('43', '14', 'data/files/store_2/goods_29/200908060923496883.jpg', 'data/files/store_2/goods_29/small_200908060923496883.jpg', '255', '45');
INSERT INTO `ecm_goods_image` VALUES ('44', '15', 'data/files/store_2/goods_147/200908060925471585.jpg', 'data/files/store_2/goods_147/small_200908060925471585.jpg', '255', '46');
INSERT INTO `ecm_goods_image` VALUES ('45', '16', 'data/files/store_2/goods_67/200908060927474675.jpg', 'data/files/store_2/goods_67/small_200908060927474675.jpg', '255', '47');
INSERT INTO `ecm_goods_image` VALUES ('46', '17', 'data/files/store_2/goods_121/200908060932011437.jpg', 'data/files/store_2/goods_121/small_200908060932011437.jpg', '255', '48');
INSERT INTO `ecm_goods_image` VALUES ('47', '17', 'data/files/store_2/goods_84/200908060934444841.jpg', 'data/files/store_2/goods_84/small_200908060934444841.jpg', '255', '49');
INSERT INTO `ecm_goods_image` VALUES ('48', '18', 'data/files/store_2/goods_195/200908060936352784.jpg', 'data/files/store_2/goods_195/small_200908060936352784.jpg', '255', '50');
INSERT INTO `ecm_goods_image` VALUES ('49', '18', 'data/files/store_2/goods_8/200908060936481674.jpg', 'data/files/store_2/goods_8/small_200908060936481674.jpg', '255', '51');
INSERT INTO `ecm_goods_image` VALUES ('50', '18', 'data/files/store_2/goods_24/200908060937048695.jpg', 'data/files/store_2/goods_24/small_200908060937048695.jpg', '255', '52');
INSERT INTO `ecm_goods_image` VALUES ('51', '19', 'data/files/store_2/goods_109/200908060938292631.jpg', 'data/files/store_2/goods_109/small_200908060938292631.jpg', '255', '53');
INSERT INTO `ecm_goods_image` VALUES ('52', '19', 'data/files/store_2/goods_124/200908060938443027.jpg', 'data/files/store_2/goods_124/small_200908060938443027.jpg', '255', '54');
INSERT INTO `ecm_goods_image` VALUES ('53', '19', 'data/files/store_2/goods_142/200908060939026685.jpg', 'data/files/store_2/goods_142/small_200908060939026685.jpg', '255', '55');
INSERT INTO `ecm_goods_image` VALUES ('54', '20', 'data/files/store_2/goods_143/200908060942233830.jpg', 'data/files/store_2/goods_143/small_200908060942233830.jpg', '255', '56');
INSERT INTO `ecm_goods_image` VALUES ('55', '20', 'data/files/store_2/goods_156/200908060942363092.jpg', 'data/files/store_2/goods_156/small_200908060942363092.jpg', '255', '57');
INSERT INTO `ecm_goods_image` VALUES ('56', '20', 'data/files/store_2/goods_166/200908060942462672.jpg', 'data/files/store_2/goods_166/small_200908060942462672.jpg', '255', '58');
INSERT INTO `ecm_goods_image` VALUES ('57', '21', 'data/files/store_2/goods_25/200908060950258122.jpg', 'data/files/store_2/goods_25/small_200908060950258122.jpg', '255', '59');
INSERT INTO `ecm_goods_image` VALUES ('58', '21', 'data/files/store_2/goods_39/200908060950399637.jpg', 'data/files/store_2/goods_39/small_200908060950399637.jpg', '255', '60');
INSERT INTO `ecm_goods_image` VALUES ('59', '21', 'data/files/store_2/goods_55/200908060950555738.jpg', 'data/files/store_2/goods_55/small_200908060950555738.jpg', '255', '61');
INSERT INTO `ecm_goods_image` VALUES ('60', '21', 'data/files/store_2/goods_67/200908060951072027.jpg', 'data/files/store_2/goods_67/small_200908060951072027.jpg', '255', '62');
INSERT INTO `ecm_goods_image` VALUES ('61', '22', 'data/files/store_2/goods_147/200908060952274906.jpg', 'data/files/store_2/goods_147/small_200908060952274906.jpg', '255', '63');
INSERT INTO `ecm_goods_image` VALUES ('62', '22', 'data/files/store_2/goods_157/200908060952376888.jpg', 'data/files/store_2/goods_157/small_200908060952376888.jpg', '255', '64');
INSERT INTO `ecm_goods_image` VALUES ('63', '23', 'data/files/store_2/goods_64/200908060954245662.jpg', 'data/files/store_2/goods_64/small_200908060954245662.jpg', '255', '65');
INSERT INTO `ecm_goods_image` VALUES ('64', '23', 'data/files/store_2/goods_72/200908060954323544.jpg', 'data/files/store_2/goods_72/small_200908060954323544.jpg', '255', '66');
INSERT INTO `ecm_goods_image` VALUES ('65', '23', 'data/files/store_2/goods_86/200908060954465326.jpg', 'data/files/store_2/goods_86/small_200908060954465326.jpg', '255', '67');
INSERT INTO `ecm_goods_image` VALUES ('66', '24', 'data/files/store_2/goods_20/200908060957002218.jpg', 'data/files/store_2/goods_20/small_200908060957002218.jpg', '255', '68');
INSERT INTO `ecm_goods_image` VALUES ('67', '25', 'data/files/store_2/goods_139/200908060958592106.jpg', 'data/files/store_2/goods_139/small_200908060958592106.jpg', '255', '69');
INSERT INTO `ecm_goods_image` VALUES ('68', '25', 'data/files/store_2/goods_151/200908060959114414.jpg', 'data/files/store_2/goods_151/small_200908060959114414.jpg', '255', '70');
INSERT INTO `ecm_goods_image` VALUES ('69', '25', 'data/files/store_2/goods_166/200908060959265796.jpg', 'data/files/store_2/goods_166/small_200908060959265796.jpg', '255', '71');
INSERT INTO `ecm_goods_image` VALUES ('70', '26', 'data/files/store_2/goods_47/200908061000474424.jpg', 'data/files/store_2/goods_47/small_200908061000474424.jpg', '255', '72');
INSERT INTO `ecm_goods_image` VALUES ('71', '26', 'data/files/store_2/goods_57/200908061000576924.jpg', 'data/files/store_2/goods_57/small_200908061000576924.jpg', '255', '73');
INSERT INTO `ecm_goods_image` VALUES ('72', '26', 'data/files/store_2/goods_71/200908061001114276.jpg', 'data/files/store_2/goods_71/small_200908061001114276.jpg', '255', '74');
INSERT INTO `ecm_goods_image` VALUES ('73', '26', 'data/files/store_2/goods_86/200908061001263175.jpg', 'data/files/store_2/goods_86/small_200908061001263175.jpg', '255', '75');
INSERT INTO `ecm_goods_image` VALUES ('74', '27', 'data/files/store_2/goods_5/200908061003253339.jpg', 'data/files/store_2/goods_5/small_200908061003253339.jpg', '255', '76');
INSERT INTO `ecm_goods_image` VALUES ('75', '27', 'data/files/store_2/goods_18/200908061003382600.jpg', 'data/files/store_2/goods_18/small_200908061003382600.jpg', '255', '77');
INSERT INTO `ecm_goods_image` VALUES ('76', '27', 'data/files/store_2/goods_29/200908061003494534.jpg', 'data/files/store_2/goods_29/small_200908061003494534.jpg', '255', '78');
INSERT INTO `ecm_goods_image` VALUES ('77', '28', 'data/files/store_2/goods_115/200908061005154170.jpg', 'data/files/store_2/goods_115/small_200908061005154170.jpg', '255', '79');
INSERT INTO `ecm_goods_image` VALUES ('78', '28', 'data/files/store_2/goods_14/200908061006541461.jpg', 'data/files/store_2/goods_14/small_200908061006541461.jpg', '255', '80');
INSERT INTO `ecm_goods_image` VALUES ('79', '28', 'data/files/store_2/goods_26/200908061007068653.jpg', 'data/files/store_2/goods_26/small_200908061007068653.jpg', '255', '81');
INSERT INTO `ecm_goods_image` VALUES ('80', '29', 'data/files/store_2/goods_121/200908061008412008.jpg', 'data/files/store_2/goods_121/small_200908061008412008.jpg', '255', '82');
INSERT INTO `ecm_goods_image` VALUES ('81', '29', 'data/files/store_2/goods_127/200908061008473587.jpg', 'data/files/store_2/goods_127/small_200908061008473587.jpg', '255', '83');

-- ----------------------------
-- Table structure for `ecm_goods_qa`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_goods_qa`;
CREATE TABLE `ecm_goods_qa` (
  `ques_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_content` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `reply_content` varchar(255) NOT NULL,
  `time_post` int(10) unsigned NOT NULL,
  `time_reply` int(10) unsigned NOT NULL,
  `if_new` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'goods',
  PRIMARY KEY (`ques_id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`item_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_goods_qa
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_goods_spec`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_goods_spec`;
CREATE TABLE `ecm_goods_spec` (
  `spec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `spec_1` varchar(60) NOT NULL DEFAULT '',
  `spec_2` varchar(60) NOT NULL DEFAULT '',
  `color_rgb` varchar(7) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(11) NOT NULL DEFAULT '0',
  `sku` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`spec_id`),
  KEY `goods_id` (`goods_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_goods_spec
-- ----------------------------
INSERT INTO `ecm_goods_spec` VALUES ('1', '1', '粉红色', 'XL', '', '99.00', '99', 'G49B7B00DB597F-1');
INSERT INTO `ecm_goods_spec` VALUES ('2', '1', '白色', 'XL', '', '99.00', '108', 'G49B7B00DB597F-2');
INSERT INTO `ecm_goods_spec` VALUES ('3', '1', '黄色', 'XL', '', '99.00', '108', 'G49B7B00DB597F-3');
INSERT INTO `ecm_goods_spec` VALUES ('4', '2', '混色', '38', '', '188.00', '100', '');
INSERT INTO `ecm_goods_spec` VALUES ('5', '2', '混色', '39', '', '198.00', '100', '');
INSERT INTO `ecm_goods_spec` VALUES ('6', '2', '深蓝色', '38', '', '188.00', '80', '');
INSERT INTO `ecm_goods_spec` VALUES ('7', '2', '深蓝色', '39', '', '188.00', '60', '');
INSERT INTO `ecm_goods_spec` VALUES ('8', '3', '', '', '', '238.00', '20', '');
INSERT INTO `ecm_goods_spec` VALUES ('9', '4', '', '', '', '170.00', '30', '');
INSERT INTO `ecm_goods_spec` VALUES ('11', '5', '蓝白混色', '39', '', '688.00', '33', '');
INSERT INTO `ecm_goods_spec` VALUES ('12', '5', '蓝白混色', '40', '', '688.00', '39', '');
INSERT INTO `ecm_goods_spec` VALUES ('13', '5', '蓝白混色', '41', '', '688.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('14', '5', '蓝白混色', '42', '', '688.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('15', '6', '', '', '', '170.00', '90', '');
INSERT INTO `ecm_goods_spec` VALUES ('16', '7', '黑色', '均码', '', '178.00', '20', '');
INSERT INTO `ecm_goods_spec` VALUES ('17', '7', '银色', '均码', '', '178.00', '30', '');
INSERT INTO `ecm_goods_spec` VALUES ('19', '8', '金色', '36', '', '368.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('20', '8', '金色', '37', '', '368.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('21', '8', '金色', '38', '', '368.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('22', '8', '黑色', '36', '', '368.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('23', '8', '黑色', '37', '', '368.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('24', '8', '黑色', '38', '', '368.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('25', '9', '', '', '', '168.00', '29', '');
INSERT INTO `ecm_goods_spec` VALUES ('26', '10', '蓝色', 'S', '', '170.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('27', '10', '蓝色', 'M', '', '170.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('28', '10', '蓝色', 'X', '', '170.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('29', '10', '蓝色', 'XL', '', '170.00', '10', '');
INSERT INTO `ecm_goods_spec` VALUES ('30', '11', '粉红', '36', '', '268.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('31', '11', '粉红', '37', '', '268.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('32', '11', '粉红', '38', '', '268.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('33', '11', '粉红', '39', '', '268.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('34', '12', '', '', '', '268.00', '29', '');
INSERT INTO `ecm_goods_spec` VALUES ('35', '13', '', '', '', '179.00', '500', '');
INSERT INTO `ecm_goods_spec` VALUES ('37', '14', '', '', '', '125.00', '33', '');
INSERT INTO `ecm_goods_spec` VALUES ('38', '15', '混色', '36', '', '578.00', '92', '');
INSERT INTO `ecm_goods_spec` VALUES ('39', '15', '混色', '37', '', '578.00', '92', '');
INSERT INTO `ecm_goods_spec` VALUES ('40', '15', '混色', '38', '', '578.00', '92', '');
INSERT INTO `ecm_goods_spec` VALUES ('41', '15', '混色', '39', '', '578.00', '92', '');
INSERT INTO `ecm_goods_spec` VALUES ('42', '16', '方格混色', '37', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('43', '16', '方格混色', '38', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('44', '16', '方格混色', '39', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('55', '17', '', '', '', '90.00', '83', '');
INSERT INTO `ecm_goods_spec` VALUES ('47', '18', '', '', '', '170.00', '27', '');
INSERT INTO `ecm_goods_spec` VALUES ('48', '19', '', '', '', '170.00', '86', '');
INSERT INTO `ecm_goods_spec` VALUES ('49', '20', '深蓝色', 'M', '', '129.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('50', '20', '深蓝色', 'X', '', '129.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('51', '20', '白色', 'M', '', '129.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('52', '20', '白色', 'X', '', '129.00', '98', '');
INSERT INTO `ecm_goods_spec` VALUES ('53', '20', '粉红色', 'M', '', '129.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('54', '20', '粉红色', 'X', '', '129.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('56', '21', '', '', '', '170.00', '87', '');
INSERT INTO `ecm_goods_spec` VALUES ('57', '22', '', '', '', '111.00', '33', '');
INSERT INTO `ecm_goods_spec` VALUES ('58', '23', '', '', '', '170.00', '500', '');
INSERT INTO `ecm_goods_spec` VALUES ('59', '24', '花色', '36', '', '169.00', '887', '');
INSERT INTO `ecm_goods_spec` VALUES ('60', '24', '花色', '37', '', '169.00', '888', '');
INSERT INTO `ecm_goods_spec` VALUES ('61', '24', '花色', '38', '', '169.00', '888', '');
INSERT INTO `ecm_goods_spec` VALUES ('62', '24', '花色', '39', '', '169.00', '888', '');
INSERT INTO `ecm_goods_spec` VALUES ('63', '25', '灰色', 'S', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('64', '25', '灰色', 'M', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('65', '25', '灰色', 'L', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('66', '25', '灰色', 'XL', '', '128.00', '88', '');
INSERT INTO `ecm_goods_spec` VALUES ('67', '26', '', '', '', '89.00', '98', '');
INSERT INTO `ecm_goods_spec` VALUES ('68', '27', '卡其色', 'M', '', '288.00', '282', '');
INSERT INTO `ecm_goods_spec` VALUES ('69', '27', '卡其色', 'X', '', '288.00', '282', '');
INSERT INTO `ecm_goods_spec` VALUES ('70', '27', '深蓝', 'M', '', '288.00', '282', '');
INSERT INTO `ecm_goods_spec` VALUES ('71', '27', '深蓝', 'X', '', '288.00', '282', '');
INSERT INTO `ecm_goods_spec` VALUES ('73', '28', '', '', '', '188.00', '2220', '');
INSERT INTO `ecm_goods_spec` VALUES ('74', '29', '', '', '', '328.00', '99', '');
INSERT INTO `ecm_goods_spec` VALUES ('75', '30', '', '', '', '100.00', '100', '111111111');

-- ----------------------------
-- Table structure for `ecm_goods_statistics`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_goods_statistics`;
CREATE TABLE `ecm_goods_statistics` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `collects` int(10) unsigned NOT NULL DEFAULT '0',
  `carts` int(10) unsigned NOT NULL DEFAULT '0',
  `orders` int(10) unsigned NOT NULL DEFAULT '0',
  `sales` int(10) unsigned NOT NULL DEFAULT '0',
  `comments` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_goods_statistics
-- ----------------------------
INSERT INTO `ecm_goods_statistics` VALUES ('1', '1', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('2', '1', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('3', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('4', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('5', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('6', '1', '0', '1', '1', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('7', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('8', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('9', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('10', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('11', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('12', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('13', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('14', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('15', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('16', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('17', '1', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('18', '1', '0', '1', '1', '0', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('19', '2', '0', '2', '2', '1', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('20', '1', '0', '1', '1', '1', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('21', '1', '0', '1', '1', '0', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('22', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('23', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('24', '1', '0', '1', '1', '1', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('25', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('26', '1', '0', '1', '1', '0', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('27', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('28', '3', '0', '2', '2', '1', '1');
INSERT INTO `ecm_goods_statistics` VALUES ('29', '0', '0', '0', '0', '0', '0');
INSERT INTO `ecm_goods_statistics` VALUES ('30', '2', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `ecm_groupbuy`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_groupbuy`;
CREATE TABLE `ecm_groupbuy` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL DEFAULT '',
  `group_desc` varchar(255) NOT NULL DEFAULT '',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `spec_price` text NOT NULL,
  `min_quantity` smallint(5) unsigned NOT NULL DEFAULT '0',
  `max_per_user` smallint(5) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `recommended` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`),
  KEY `goods_id` (`goods_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_groupbuy
-- ----------------------------
INSERT INTO `ecm_groupbuy` VALUES ('1', '测试团购', '', '1438754257', '1441065599', '30', '2', 'a:1:{i:75;a:1:{s:5:\"price\";s:5:\"90.00\";}}', '10', '1', '1', '0', '3');

-- ----------------------------
-- Table structure for `ecm_groupbuy_log`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_groupbuy_log`;
CREATE TABLE `ecm_groupbuy_log` (
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `quantity` smallint(5) unsigned NOT NULL DEFAULT '0',
  `spec_quantity` text NOT NULL,
  `linkman` varchar(60) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_groupbuy_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_mail_queue`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_mail_queue`;
CREATE TABLE `ecm_mail_queue` (
  `queue_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mail_to` varchar(150) NOT NULL DEFAULT '',
  `mail_encoding` varchar(50) NOT NULL DEFAULT '',
  `mail_subject` varchar(255) NOT NULL DEFAULT '',
  `mail_body` text NOT NULL,
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `err_num` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `lock_expiry` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`queue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_mail_queue
-- ----------------------------
INSERT INTO `ecm_mail_queue` VALUES ('8', 'seller@ecmall.com', 'utf-8', 'ECMall演示站提醒:买家guobao已通过线下支付支付了订单的费用', '<p>尊敬的演示店铺:</p>\r\n<p style=\"padding-left: 30px;\">买家guobao已通过线下支付支付了与您交易的订单1521453324。请注意查收。</p>\r\n<p style=\"padding-left: 30px;\">支付信息：111</p>\r\n<p style=\"padding-left: 30px;\">查看订单详细信息请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=10\">http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=10</a></p>\r\n<p style=\"padding-left: 30px;\">查看您的订单列表管理页请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order\">http://ecmall/index.php?app=seller_order</a></p>\r\n<p style=\"text-align: right;\">ECMall演示站</p>\r\n<p style=\"text-align: right;\">2015-08-03 14:10</p>', '1', '1', '1438582254', '1438582285');
INSERT INTO `ecm_mail_queue` VALUES ('4', '123@qq.com', 'utf-8', 'ECMall演示站提醒:您的订单已生成', '<p>尊敬的guobao:</p>\r\n<p style=\"padding-left: 30px;\">您在ECMall演示站上下的订单已生成，订单号1521453324。</p>\r\n<p style=\"padding-left: 30px;\">查看订单详细信息请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=buyer_order&amp;act=view&amp;order_id=10\">http://ecmall/index.php?app=buyer_order&amp;act=view&amp;order_id=10</a></p>\r\n<p style=\"text-align: right;\">ECMall演示站</p>\r\n<p style=\"text-align: right;\">2015-08-03 14:06</p>', '1', '1', '1438582018', '1438582266');
INSERT INTO `ecm_mail_queue` VALUES ('5', 'seller@ecmall.com', 'utf-8', 'ECMall演示站提醒:您有一个新订单需要处理', '<p>尊敬的演示店铺:</p>\r\n<p style=\"padding-left: 30px;\">您有一个新的订单需要处理，订单号1521453324，请尽快处理。</p>\r\n<p style=\"padding-left: 30px;\">查看订单详细信息请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=10\">http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=10</a></p>\r\n<p style=\"padding-left: 30px;\">查看您的订单列表管理页请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order\">http://ecmall/index.php?app=seller_order</a></p>\r\n<p style=\"text-align: right;\">ECMall演示站</p>\r\n<p style=\"text-align: right;\">2015-08-03 14:06</p>', '1', '1', '1438582018', '1438582266');
INSERT INTO `ecm_mail_queue` VALUES ('6', 'seller@ecmall.com', 'utf-8', 'ECMall演示站提醒:买家guobao已通过线下支付支付了订单的费用', '<p>尊敬的演示店铺:</p>\r\n<p style=\"padding-left: 30px;\">买家guobao已通过线下支付支付了与您交易的订单1521453324。请注意查收。</p>\r\n<p style=\"padding-left: 30px;\">支付信息：111</p>\r\n<p style=\"padding-left: 30px;\">查看订单详细信息请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=10\">http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=10</a></p>\r\n<p style=\"padding-left: 30px;\">查看您的订单列表管理页请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order\">http://ecmall/index.php?app=seller_order</a></p>\r\n<p style=\"text-align: right;\">ECMall演示站</p>\r\n<p style=\"text-align: right;\">2015-08-03 14:09</p>', '1', '1', '1438582164', '1438582266');
INSERT INTO `ecm_mail_queue` VALUES ('7', 'seller@ecmall.com', 'utf-8', 'ECMall演示站提醒:买家guobao已通过线下支付支付了订单的费用', '<p>尊敬的演示店铺:</p>\r\n<p style=\"padding-left: 30px;\">买家guobao已通过线下支付支付了与您交易的订单1521105379。请注意查收。</p>\r\n<p style=\"padding-left: 30px;\">支付信息：11111111111</p>\r\n<p style=\"padding-left: 30px;\">查看订单详细信息请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=9\">http://ecmall/index.php?app=seller_order&amp;act=view&amp;order_id=9</a></p>\r\n<p style=\"padding-left: 30px;\">查看您的订单列表管理页请点击以下链接</p>\r\n<p style=\"padding-left: 30px;\"><a href=\"http://ecmall/index.php?app=seller_order\">http://ecmall/index.php?app=seller_order</a></p>\r\n<p style=\"text-align: right;\">ECMall演示站</p>\r\n<p style=\"text-align: right;\">2015-08-03 14:09</p>', '1', '1', '1438582194', '1438582266');

-- ----------------------------
-- Table structure for `ecm_member`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_member`;
CREATE TABLE `ecm_member` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `real_name` varchar(60) DEFAULT NULL,
  `gender` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `phone_tel` varchar(60) DEFAULT NULL,
  `phone_mob` varchar(60) DEFAULT NULL,
  `im_qq` varchar(60) DEFAULT NULL,
  `im_msn` varchar(60) DEFAULT NULL,
  `im_skype` varchar(60) DEFAULT NULL,
  `im_yahoo` varchar(60) DEFAULT NULL,
  `im_aliww` varchar(60) DEFAULT NULL,
  `reg_time` int(10) unsigned DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `ugrade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `portrait` varchar(255) DEFAULT NULL,
  `outer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `activation` varchar(60) DEFAULT NULL,
  `feed_config` text NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `outer_id` (`outer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_member
-- ----------------------------
INSERT INTO `ecm_member` VALUES ('1', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', null, '0', null, null, null, null, null, null, null, null, '1438306573', '1438754304', '127.0.0.1', '6', '0', null, '0', null, '');
INSERT INTO `ecm_member` VALUES ('2', 'guobao', '123@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '国宝', '0', '0000-00-00', null, null, '', '', null, null, null, '1438307455', '1438753623', '127.0.0.1', '5', '0', null, '0', null, '');
INSERT INTO `ecm_member` VALUES ('3', 'seller', 'seller@ecmall.com', 'e10adc3949ba59abbe56e057f20f883e', '超级卖家', '0', null, null, null, null, null, null, null, null, '1438307858', null, null, '0', '0', null, '0', null, '');
INSERT INTO `ecm_member` VALUES ('4', 'buyer', 'buyer@ecmall.com', 'e10adc3949ba59abbe56e057f20f883e', '超级买家', '0', null, null, null, null, null, null, null, null, '1438307858', null, null, '0', '0', null, '0', null, '');

-- ----------------------------
-- Table structure for `ecm_message`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_message`;
CREATE TABLE `ecm_message` (
  `msg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(10) unsigned NOT NULL DEFAULT '0',
  `to_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  `new` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_message
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_module`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_module`;
CREATE TABLE `ecm_module` (
  `module_id` varchar(30) NOT NULL DEFAULT '',
  `module_name` varchar(100) NOT NULL DEFAULT '',
  `module_version` varchar(5) NOT NULL DEFAULT '',
  `module_desc` text NOT NULL,
  `module_config` text NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_module
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_navigation`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_navigation`;
CREATE TABLE `ecm_navigation` (
  `nav_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(60) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `open_new` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_navigation
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_order`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_order`;
CREATE TABLE `ecm_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT 'material',
  `extension` varchar(10) NOT NULL DEFAULT '',
  `seller_id` int(10) unsigned NOT NULL DEFAULT '0',
  `seller_name` varchar(100) DEFAULT NULL,
  `buyer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `buyer_name` varchar(100) DEFAULT NULL,
  `buyer_email` varchar(60) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_id` int(10) unsigned DEFAULT NULL,
  `payment_name` varchar(100) DEFAULT NULL,
  `payment_code` varchar(20) NOT NULL DEFAULT '',
  `out_trade_sn` varchar(20) NOT NULL DEFAULT '',
  `pay_time` int(10) unsigned DEFAULT NULL,
  `pay_message` varchar(255) NOT NULL DEFAULT '',
  `ship_time` int(10) unsigned DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `finished_time` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `order_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `evaluation_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `evaluation_time` int(10) unsigned NOT NULL DEFAULT '0',
  `anonymous` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `postscript` varchar(255) NOT NULL DEFAULT '',
  `pay_alter` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `order_sn` (`order_sn`,`seller_id`),
  KEY `seller_name` (`seller_name`),
  KEY `buyer_name` (`buyer_name`),
  KEY `add_time` (`add_time`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_order
-- ----------------------------
INSERT INTO `ecm_order` VALUES ('1', '0921861930', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '0', '1249611845', '2', '银行汇款', 'bank', '', null, '已付款100元', null, null, '0', '170.00', '0.00', '175.00', '0', '0', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('2', '0921820055', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611887', '1', '货到付款', 'cod', '', '1249612115', '', '1249612111', '33333333', '1249612115', '170.00', '0.00', '180.00', '1', '1249612248', '0', '请尽快发货', '0');
INSERT INTO `ecm_order` VALUES ('3', '0921801993', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611902', '2', '银行汇款', 'bank', '', '1249612096', '我已汇款', '1249612102', 'cccc3333', '1249612221', '170.00', '0.00', '190.00', '1', '1249612230', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('4', '0921847484', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611932', '2', '银行汇款', 'bank', '', '1249612086', '已付款', '1249612092', 'dddd2222', '1249612205', '129.00', '0.00', '134.00', '1', '1249612217', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('5', '0921838115', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611951', '1', '货到付款', 'cod', '', '1249612081', '', '1249612077', 'dddd2222', '1249612081', '170.00', '0.00', '180.00', '1', '1249612201', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('6', '0921877812', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611968', '2', '银行汇款', 'bank', '', '1249612054', '已付款', '1249612058', 'aaaaa', '1249612171', '169.00', '0.00', '174.00', '1', '1249612188', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('7', '0921848095', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611987', '1', '货到付款', 'cod', '', '1249612050', '', '1249612042', 'abcd1234', '1249612050', '89.00', '0.00', '99.00', '1', '1249612167', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('8', '0921855800', 'material', 'normal', '3', '演示店铺', '4', 'buyer', 'buyer@ecmall.com', '40', '1249611999', '2', '银行汇款', 'bank', '', '1249612021', '已付款', '1249612031', 'abcd1234', '1249612132', '188.00', '0.00', '208.00', '1', '1249612152', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('9', '1521105379', 'material', 'normal', '3', '演示店铺', '2', 'guobao', '123@qq.com', '11', '1438311002', '2', '银行汇款', 'bank', '', null, '11111111111', null, null, '0', '170.00', '0.00', '175.00', '0', '0', '0', '', '0');
INSERT INTO `ecm_order` VALUES ('10', '1521453324', 'material', 'normal', '3', '演示店铺', '2', 'guobao', '123@qq.com', '11', '1438582018', '2', '银行汇款', 'bank', '', null, '111', null, null, '0', '188.00', '0.00', '193.00', '0', '0', '0', '', '0');

-- ----------------------------
-- Table structure for `ecm_order_extm`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_order_extm`;
CREATE TABLE `ecm_order_extm` (
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phone_tel` varchar(60) DEFAULT NULL,
  `phone_mob` varchar(60) DEFAULT NULL,
  `shipping_id` int(10) unsigned DEFAULT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`order_id`),
  KEY `consignee` (`consignee`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_order_extm
-- ----------------------------
INSERT INTO `ecm_order_extm` VALUES ('1', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '1', '平邮', '5.00');
INSERT INTO `ecm_order_extm` VALUES ('2', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '2', '快递', '10.00');
INSERT INTO `ecm_order_extm` VALUES ('3', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '3', 'EMS', '20.00');
INSERT INTO `ecm_order_extm` VALUES ('4', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '1', '平邮', '5.00');
INSERT INTO `ecm_order_extm` VALUES ('5', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '2', '快递', '10.00');
INSERT INTO `ecm_order_extm` VALUES ('6', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '1', '平邮', '5.00');
INSERT INTO `ecm_order_extm` VALUES ('7', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '2', '快递', '10.00');
INSERT INTO `ecm_order_extm` VALUES ('8', '超级卖家', '43', '中国	上海市	徐汇区', '长江路15号', '200088', '021-88886666', '13366669999', '3', 'EMS', '20.00');
INSERT INTO `ecm_order_extm` VALUES ('9', '测试', '65', '中国	重庆市	沙坪坝', '测试测试测试测试测试', '230000', '18212271611', '', '1', '平邮', '5.00');
INSERT INTO `ecm_order_extm` VALUES ('10', '测试', '65', '中国	重庆市	沙坪坝', '测试测试测试测试测试', '230000', '18212271611', '', '1', '平邮', '5.00');

-- ----------------------------
-- Table structure for `ecm_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_order_goods`;
CREATE TABLE `ecm_order_goods` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(255) NOT NULL DEFAULT '',
  `spec_id` int(10) unsigned NOT NULL DEFAULT '0',
  `specification` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `goods_image` varchar(255) DEFAULT NULL,
  `evaluation` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `credit_value` tinyint(1) NOT NULL DEFAULT '0',
  `is_valid` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`rec_id`),
  KEY `order_id` (`order_id`,`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_order_goods
-- ----------------------------
INSERT INTO `ecm_order_goods` VALUES ('1', '1', '6', '包邮韩版经典长袖雪纺下摆针织连衣裙', '15', '', '170.00', '1', 'data/files/store_2/goods_95/small_200908060841358079.jpg', '0', '', '0', '1');
INSERT INTO `ecm_order_goods` VALUES ('2', '2', '18', '春针织淑女连衣裙女装', '47', '', '170.00', '1', 'data/files/store_2/goods_195/small_200908060936352784.jpg', '3', '板型很好，做工不错', '1', '1');
INSERT INTO `ecm_order_goods` VALUES ('3', '3', '19', '罗衣OL气质真丝雪纺百褶裙针织背心裙', '48', '', '170.00', '1', 'data/files/store_2/goods_109/small_200908060938292631.jpg', '3', '发货很快，我很满意', '1', '1');
INSERT INTO `ecm_order_goods` VALUES ('4', '4', '20', '小脚牛仔铅笔裤', '52', '颜色:白色 尺码:X', '129.00', '1', 'data/files/store_2/goods_143/small_200908060942233830.jpg', '3', '穿起来那叫一个好看', '1', '1');
INSERT INTO `ecm_order_goods` VALUES ('5', '5', '21', '09春季新款简约大方高雅修身针织连衣裙983配腰带', '56', '', '170.00', '1', 'data/files/store_2/goods_25/small_200908060950258122.jpg', '3', '做工很不错', '1', '1');
INSERT INTO `ecm_order_goods` VALUES ('6', '6', '24', '阿迪达斯花式运动鞋', '59', '颜色:花色 尺码:36', '169.00', '1', 'data/files/store_2/goods_20/small_200908060957002218.jpg', '3', '穿着太舒服了，发货也快', '1', '1');
INSERT INTO `ecm_order_goods` VALUES ('7', '7', '26', '喜皮风格牛仔短裤', '67', '', '89.00', '1', 'data/files/store_2/goods_47/small_200908061000474424.jpg', '2', '没有想象中的好', '0', '1');
INSERT INTO `ecm_order_goods` VALUES ('8', '8', '28', '欧美精贵密码七分袖名媛洋装款水钻圆领绸缎小外套', '73', '', '188.00', '1', 'data/files/store_2/goods_115/small_200908061005154170.jpg', '3', '穿上很好看，价格也实在', '1', '1');
INSERT INTO `ecm_order_goods` VALUES ('9', '9', '19', '罗衣OL气质真丝雪纺百褶裙针织背心裙', '48', '', '170.00', '1', 'data/files/store_2/goods_109/small_200908060938292631.jpg', '0', '', '0', '1');
INSERT INTO `ecm_order_goods` VALUES ('10', '10', '28', '欧美精贵密码七分袖名媛洋装款水钻圆领绸缎小外套', '73', '', '188.00', '1', 'data/files/store_2/goods_115/small_200908061005154170.jpg', '0', '', '0', '1');

-- ----------------------------
-- Table structure for `ecm_order_log`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_order_log`;
CREATE TABLE `ecm_order_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `operator` varchar(60) NOT NULL DEFAULT '',
  `order_status` varchar(60) NOT NULL DEFAULT '',
  `changed_status` varchar(60) NOT NULL DEFAULT '',
  `remark` varchar(255) DEFAULT NULL,
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_order_log
-- ----------------------------
INSERT INTO `ecm_order_log` VALUES ('1', '8', 'seller', '待付款', '待发货', '', '1249612021');
INSERT INTO `ecm_order_log` VALUES ('2', '8', 'seller', '待发货', '已发货', '', '1249612031');
INSERT INTO `ecm_order_log` VALUES ('3', '7', 'seller', '已提交', '待发货', '', '1249612038');
INSERT INTO `ecm_order_log` VALUES ('4', '7', 'seller', '待发货', '已发货', '', '1249612042');
INSERT INTO `ecm_order_log` VALUES ('5', '7', 'seller', '已发货', '已完成', '', '1249612050');
INSERT INTO `ecm_order_log` VALUES ('6', '6', 'seller', '待付款', '待发货', '', '1249612054');
INSERT INTO `ecm_order_log` VALUES ('7', '6', 'seller', '待发货', '已发货', '', '1249612058');
INSERT INTO `ecm_order_log` VALUES ('8', '5', 'seller', '已提交', '待发货', '', '1249612069');
INSERT INTO `ecm_order_log` VALUES ('9', '5', 'seller', '待发货', '已发货', '', '1249612077');
INSERT INTO `ecm_order_log` VALUES ('10', '5', 'seller', '已发货', '已完成', '', '1249612081');
INSERT INTO `ecm_order_log` VALUES ('11', '4', 'seller', '待付款', '待发货', '', '1249612086');
INSERT INTO `ecm_order_log` VALUES ('12', '4', 'seller', '待发货', '已发货', '', '1249612092');
INSERT INTO `ecm_order_log` VALUES ('13', '3', 'seller', '待付款', '待发货', '', '1249612096');
INSERT INTO `ecm_order_log` VALUES ('14', '3', 'seller', '待发货', '已发货', '', '1249612102');
INSERT INTO `ecm_order_log` VALUES ('15', '2', 'seller', '已提交', '待发货', '', '1249612106');
INSERT INTO `ecm_order_log` VALUES ('16', '2', 'seller', '待发货', '已发货', '', '1249612111');
INSERT INTO `ecm_order_log` VALUES ('17', '2', 'seller', '已发货', '已完成', '', '1249612115');
INSERT INTO `ecm_order_log` VALUES ('18', '1', 'seller', '待付款', '已取消', '不是有效的订单', '1249612121');
INSERT INTO `ecm_order_log` VALUES ('19', '8', 'buyer', '已发货', '已完成', '买家确认收货', '1249612132');
INSERT INTO `ecm_order_log` VALUES ('20', '6', 'buyer', '已发货', '已完成', '买家确认收货', '1249612171');
INSERT INTO `ecm_order_log` VALUES ('21', '4', 'buyer', '已发货', '已完成', '买家确认收货', '1249612205');
INSERT INTO `ecm_order_log` VALUES ('22', '3', 'buyer', '已发货', '已完成', '买家确认收货', '1249612221');

-- ----------------------------
-- Table structure for `ecm_pageview`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_pageview`;
CREATE TABLE `ecm_pageview` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `view_date` date NOT NULL DEFAULT '0000-00-00',
  `view_times` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`rec_id`),
  UNIQUE KEY `storedate` (`store_id`,`view_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_pageview
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_partner`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_partner`;
CREATE TABLE `ecm_partner` (
  `partner_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) DEFAULT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`partner_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_partner
-- ----------------------------
INSERT INTO `ecm_partner` VALUES ('2', '3', 'ECMall', 'http://ecmall.shopex.cn', null, '1');
INSERT INTO `ecm_partner` VALUES ('3', '3', 'ECShop', 'http://www.ecshop.com', null, '2');
INSERT INTO `ecm_partner` VALUES ('4', '0', '上海商派', 'http://www.shopex.cn', 'data/files/mall/partner/4.png', '1');
INSERT INTO `ecm_partner` VALUES ('5', '0', '支付宝', 'http://www.alipay.com', 'data/files/mall/partner/5.gif', '2');
INSERT INTO `ecm_partner` VALUES ('6', '0', '财付通', 'http://www.tenpay.com', 'data/files/mall/partner/6.PNG', '3');

-- ----------------------------
-- Table structure for `ecm_payment`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_payment`;
CREATE TABLE `ecm_payment` (
  `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_code` varchar(20) NOT NULL DEFAULT '',
  `payment_name` varchar(100) NOT NULL DEFAULT '',
  `payment_desc` varchar(255) DEFAULT NULL,
  `config` text,
  `is_online` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`payment_id`),
  KEY `store_id` (`store_id`),
  KEY `payment_code` (`payment_code`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_payment
-- ----------------------------
INSERT INTO `ecm_payment` VALUES ('1', '3', 'cod', '货到付款', '送货上门，看货后付款', '', '0', '1', '2');
INSERT INTO `ecm_payment` VALUES ('2', '3', 'bank', '银行汇款', '中国工商银行 955880001118282828 张老板\r\n中国农业银行 138292992992929292 张老板', '', '0', '1', '1');
INSERT INTO `ecm_payment` VALUES ('3', '2', 'cod', '货到付款', '', '', '0', '0', '0');
INSERT INTO `ecm_payment` VALUES ('6', '2', 'alipay', '支付宝', '', 'a:5:{s:14:\"alipay_account\";s:0:\"\";s:10:\"alipay_key\";s:0:\"\";s:14:\"alipay_partner\";s:0:\"\";s:14:\"alipay_service\";s:21:\"trade_create_by_buyer\";s:5:\"pcode\";s:0:\"\";}', '1', '1', '0');

-- ----------------------------
-- Table structure for `ecm_privilege`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_privilege`;
CREATE TABLE `ecm_privilege` (
  `priv_code` varchar(20) NOT NULL DEFAULT '',
  `priv_name` varchar(60) NOT NULL DEFAULT '',
  `parent_code` varchar(20) DEFAULT NULL,
  `owner` varchar(10) NOT NULL DEFAULT 'mall',
  PRIMARY KEY (`priv_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_privilege
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_recommend`;
CREATE TABLE `ecm_recommend` (
  `recom_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recom_name` varchar(100) NOT NULL DEFAULT '',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`recom_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_recommend
-- ----------------------------
INSERT INTO `ecm_recommend` VALUES ('15', '裙子2', '0');
INSERT INTO `ecm_recommend` VALUES ('14', '裙子1', '0');
INSERT INTO `ecm_recommend` VALUES ('13', '外套2', '0');
INSERT INTO `ecm_recommend` VALUES ('12', '外套1', '0');
INSERT INTO `ecm_recommend` VALUES ('11', '精品', '0');
INSERT INTO `ecm_recommend` VALUES ('10', '特价2', '0');
INSERT INTO `ecm_recommend` VALUES ('9', '特价1', '0');

-- ----------------------------
-- Table structure for `ecm_recommended_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_recommended_goods`;
CREATE TABLE `ecm_recommended_goods` (
  `recom_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`recom_id`,`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_recommended_goods
-- ----------------------------
INSERT INTO `ecm_recommended_goods` VALUES ('15', '17', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '18', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '19', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '20', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '21', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '22', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '23', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '24', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '25', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '26', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('15', '27', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('14', '28', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('14', '29', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('14', '1', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('14', '2', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('14', '3', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('14', '4', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '5', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '6', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '7', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '8', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '9', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '10', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '11', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('13', '12', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('12', '13', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('12', '14', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('12', '15', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('12', '16', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('11', '17', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('11', '18', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('11', '19', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('11', '20', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('11', '21', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('11', '22', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('10', '23', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('10', '24', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('10', '25', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('10', '26', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('9', '27', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('9', '28', '255');
INSERT INTO `ecm_recommended_goods` VALUES ('9', '29', '255');

-- ----------------------------
-- Table structure for `ecm_region`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_region`;
CREATE TABLE `ecm_region` (
  `region_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`region_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=477 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_region
-- ----------------------------
INSERT INTO `ecm_region` VALUES ('2', '中国', '0', '255');
INSERT INTO `ecm_region` VALUES ('3', '北京市', '2', '255');
INSERT INTO `ecm_region` VALUES ('4', '东城', '3', '255');
INSERT INTO `ecm_region` VALUES ('5', '西城', '3', '255');
INSERT INTO `ecm_region` VALUES ('6', '崇文', '3', '255');
INSERT INTO `ecm_region` VALUES ('7', '宣武', '3', '255');
INSERT INTO `ecm_region` VALUES ('8', '朝阳', '3', '255');
INSERT INTO `ecm_region` VALUES ('9', '海淀', '3', '255');
INSERT INTO `ecm_region` VALUES ('10', '丰台', '3', '255');
INSERT INTO `ecm_region` VALUES ('11', '石景山', '3', '255');
INSERT INTO `ecm_region` VALUES ('12', '门头沟', '3', '255');
INSERT INTO `ecm_region` VALUES ('13', '房山', '3', '255');
INSERT INTO `ecm_region` VALUES ('14', '通州', '3', '255');
INSERT INTO `ecm_region` VALUES ('15', '顺义', '3', '255');
INSERT INTO `ecm_region` VALUES ('16', '大兴', '3', '255');
INSERT INTO `ecm_region` VALUES ('17', '昌平', '3', '255');
INSERT INTO `ecm_region` VALUES ('18', '平谷', '3', '255');
INSERT INTO `ecm_region` VALUES ('19', '怀柔', '3', '255');
INSERT INTO `ecm_region` VALUES ('20', '延庆', '3', '255');
INSERT INTO `ecm_region` VALUES ('21', '密云', '3', '255');
INSERT INTO `ecm_region` VALUES ('22', '天津市', '2', '255');
INSERT INTO `ecm_region` VALUES ('23', '和平区', '22', '255');
INSERT INTO `ecm_region` VALUES ('24', '河东区', '22', '255');
INSERT INTO `ecm_region` VALUES ('25', '河西区', '22', '255');
INSERT INTO `ecm_region` VALUES ('26', '南开区', '22', '255');
INSERT INTO `ecm_region` VALUES ('27', '河北区', '22', '255');
INSERT INTO `ecm_region` VALUES ('28', '红桥区', '22', '255');
INSERT INTO `ecm_region` VALUES ('29', '塘沽区', '22', '255');
INSERT INTO `ecm_region` VALUES ('30', '汉沽区', '22', '255');
INSERT INTO `ecm_region` VALUES ('31', '大港区', '22', '255');
INSERT INTO `ecm_region` VALUES ('32', '西青区', '22', '255');
INSERT INTO `ecm_region` VALUES ('33', '东丽区', '22', '255');
INSERT INTO `ecm_region` VALUES ('34', '津南区', '22', '255');
INSERT INTO `ecm_region` VALUES ('35', '北辰区', '22', '255');
INSERT INTO `ecm_region` VALUES ('36', '武清区', '22', '255');
INSERT INTO `ecm_region` VALUES ('37', '宝坻区', '22', '255');
INSERT INTO `ecm_region` VALUES ('38', '静海县', '22', '255');
INSERT INTO `ecm_region` VALUES ('39', '宁河县', '22', '255');
INSERT INTO `ecm_region` VALUES ('40', '蓟县', '22', '255');
INSERT INTO `ecm_region` VALUES ('41', '上海市', '2', '255');
INSERT INTO `ecm_region` VALUES ('42', '浦东新区', '41', '255');
INSERT INTO `ecm_region` VALUES ('43', '徐汇区', '41', '255');
INSERT INTO `ecm_region` VALUES ('44', '长宁区', '41', '255');
INSERT INTO `ecm_region` VALUES ('45', '普陀区', '41', '255');
INSERT INTO `ecm_region` VALUES ('46', '闸北区', '41', '255');
INSERT INTO `ecm_region` VALUES ('47', '虹口区', '41', '255');
INSERT INTO `ecm_region` VALUES ('48', '杨浦区', '41', '255');
INSERT INTO `ecm_region` VALUES ('49', '黄浦区', '41', '255');
INSERT INTO `ecm_region` VALUES ('50', '卢湾区', '41', '255');
INSERT INTO `ecm_region` VALUES ('51', '静安区', '41', '255');
INSERT INTO `ecm_region` VALUES ('52', '宝山区', '41', '255');
INSERT INTO `ecm_region` VALUES ('53', '闵行区', '41', '255');
INSERT INTO `ecm_region` VALUES ('54', '嘉定区', '41', '255');
INSERT INTO `ecm_region` VALUES ('55', '金山区', '41', '255');
INSERT INTO `ecm_region` VALUES ('56', '松江区', '41', '255');
INSERT INTO `ecm_region` VALUES ('57', '青浦区', '41', '255');
INSERT INTO `ecm_region` VALUES ('58', '崇明县', '41', '255');
INSERT INTO `ecm_region` VALUES ('59', '奉贤区', '41', '255');
INSERT INTO `ecm_region` VALUES ('60', '南汇区', '41', '255');
INSERT INTO `ecm_region` VALUES ('61', '重庆市', '2', '255');
INSERT INTO `ecm_region` VALUES ('62', '渝中', '61', '255');
INSERT INTO `ecm_region` VALUES ('63', '大渡口', '61', '255');
INSERT INTO `ecm_region` VALUES ('64', '江北', '61', '255');
INSERT INTO `ecm_region` VALUES ('65', '沙坪坝', '61', '255');
INSERT INTO `ecm_region` VALUES ('66', '九龙坡', '61', '255');
INSERT INTO `ecm_region` VALUES ('67', '南岸', '61', '255');
INSERT INTO `ecm_region` VALUES ('68', '北碚', '61', '255');
INSERT INTO `ecm_region` VALUES ('69', '渝北', '61', '255');
INSERT INTO `ecm_region` VALUES ('70', '巴南', '61', '255');
INSERT INTO `ecm_region` VALUES ('71', '北部新区', '61', '255');
INSERT INTO `ecm_region` VALUES ('72', '经开区', '61', '255');
INSERT INTO `ecm_region` VALUES ('73', '万盛', '61', '255');
INSERT INTO `ecm_region` VALUES ('74', '双桥', '61', '255');
INSERT INTO `ecm_region` VALUES ('75', '綦江', '61', '255');
INSERT INTO `ecm_region` VALUES ('76', '潼南', '61', '255');
INSERT INTO `ecm_region` VALUES ('77', '铜梁', '61', '255');
INSERT INTO `ecm_region` VALUES ('78', '大足', '61', '255');
INSERT INTO `ecm_region` VALUES ('79', '荣昌', '61', '255');
INSERT INTO `ecm_region` VALUES ('80', '璧山', '61', '255');
INSERT INTO `ecm_region` VALUES ('81', '江津', '61', '255');
INSERT INTO `ecm_region` VALUES ('82', '合川', '61', '255');
INSERT INTO `ecm_region` VALUES ('83', '永川', '61', '255');
INSERT INTO `ecm_region` VALUES ('84', '南川', '61', '255');
INSERT INTO `ecm_region` VALUES ('85', '万州', '61', '255');
INSERT INTO `ecm_region` VALUES ('86', '涪陵', '61', '255');
INSERT INTO `ecm_region` VALUES ('87', '黔江', '61', '255');
INSERT INTO `ecm_region` VALUES ('88', '长寿', '61', '255');
INSERT INTO `ecm_region` VALUES ('89', '梁平', '61', '255');
INSERT INTO `ecm_region` VALUES ('90', '城口', '61', '255');
INSERT INTO `ecm_region` VALUES ('91', '丰都', '61', '255');
INSERT INTO `ecm_region` VALUES ('92', '垫江', '61', '255');
INSERT INTO `ecm_region` VALUES ('93', '武隆', '61', '255');
INSERT INTO `ecm_region` VALUES ('94', '忠县', '61', '255');
INSERT INTO `ecm_region` VALUES ('95', '开县', '61', '255');
INSERT INTO `ecm_region` VALUES ('96', '云阳', '61', '255');
INSERT INTO `ecm_region` VALUES ('97', '奉节', '61', '255');
INSERT INTO `ecm_region` VALUES ('98', '巫山', '61', '255');
INSERT INTO `ecm_region` VALUES ('99', '巫溪', '61', '255');
INSERT INTO `ecm_region` VALUES ('100', '石柱', '61', '255');
INSERT INTO `ecm_region` VALUES ('101', '秀山', '61', '255');
INSERT INTO `ecm_region` VALUES ('102', '酉阳', '61', '255');
INSERT INTO `ecm_region` VALUES ('103', '彭水', '61', '255');
INSERT INTO `ecm_region` VALUES ('104', '河北省', '2', '255');
INSERT INTO `ecm_region` VALUES ('105', '石家庄', '104', '255');
INSERT INTO `ecm_region` VALUES ('106', '衡水', '104', '255');
INSERT INTO `ecm_region` VALUES ('107', '唐山', '104', '255');
INSERT INTO `ecm_region` VALUES ('108', '秦皇岛', '104', '255');
INSERT INTO `ecm_region` VALUES ('109', '张家口', '104', '255');
INSERT INTO `ecm_region` VALUES ('110', '承德', '104', '255');
INSERT INTO `ecm_region` VALUES ('111', '邯郸', '104', '255');
INSERT INTO `ecm_region` VALUES ('112', '沧州', '104', '255');
INSERT INTO `ecm_region` VALUES ('113', '邢台', '104', '255');
INSERT INTO `ecm_region` VALUES ('114', '保定', '104', '255');
INSERT INTO `ecm_region` VALUES ('115', '廊坊', '104', '255');
INSERT INTO `ecm_region` VALUES ('116', '山西省', '2', '255');
INSERT INTO `ecm_region` VALUES ('117', '太原市', '116', '255');
INSERT INTO `ecm_region` VALUES ('118', '大同市', '116', '255');
INSERT INTO `ecm_region` VALUES ('119', '朔州市', '116', '255');
INSERT INTO `ecm_region` VALUES ('120', '忻州市', '116', '255');
INSERT INTO `ecm_region` VALUES ('121', '长治市', '116', '255');
INSERT INTO `ecm_region` VALUES ('122', '阳泉市', '116', '255');
INSERT INTO `ecm_region` VALUES ('123', '晋中市', '116', '255');
INSERT INTO `ecm_region` VALUES ('124', '吕梁市', '116', '255');
INSERT INTO `ecm_region` VALUES ('125', '晋城市', '116', '255');
INSERT INTO `ecm_region` VALUES ('126', '临汾市', '116', '255');
INSERT INTO `ecm_region` VALUES ('127', '运城市', '116', '255');
INSERT INTO `ecm_region` VALUES ('128', '辽宁省', '2', '255');
INSERT INTO `ecm_region` VALUES ('129', '沈阳', '128', '255');
INSERT INTO `ecm_region` VALUES ('130', '大连', '128', '255');
INSERT INTO `ecm_region` VALUES ('131', '鞍山', '128', '255');
INSERT INTO `ecm_region` VALUES ('132', '抚顺', '128', '255');
INSERT INTO `ecm_region` VALUES ('133', '本溪', '128', '255');
INSERT INTO `ecm_region` VALUES ('134', '丹东', '128', '255');
INSERT INTO `ecm_region` VALUES ('135', '锦州', '128', '255');
INSERT INTO `ecm_region` VALUES ('136', '营口', '128', '255');
INSERT INTO `ecm_region` VALUES ('137', '阜新', '128', '255');
INSERT INTO `ecm_region` VALUES ('138', '辽阳', '128', '255');
INSERT INTO `ecm_region` VALUES ('139', '铁岭', '128', '255');
INSERT INTO `ecm_region` VALUES ('140', '朝阳', '128', '255');
INSERT INTO `ecm_region` VALUES ('141', '盘锦', '128', '255');
INSERT INTO `ecm_region` VALUES ('142', '葫芦岛', '128', '255');
INSERT INTO `ecm_region` VALUES ('143', '吉林省', '2', '255');
INSERT INTO `ecm_region` VALUES ('144', '长春市', '143', '255');
INSERT INTO `ecm_region` VALUES ('145', '吉林市', '143', '255');
INSERT INTO `ecm_region` VALUES ('146', '四平市', '143', '255');
INSERT INTO `ecm_region` VALUES ('147', '辽源市', '143', '255');
INSERT INTO `ecm_region` VALUES ('148', '通化市', '143', '255');
INSERT INTO `ecm_region` VALUES ('149', '白山市', '143', '255');
INSERT INTO `ecm_region` VALUES ('150', '松原市', '143', '255');
INSERT INTO `ecm_region` VALUES ('151', '白城市', '143', '255');
INSERT INTO `ecm_region` VALUES ('152', '延边州', '143', '255');
INSERT INTO `ecm_region` VALUES ('153', '黑龙江省', '2', '255');
INSERT INTO `ecm_region` VALUES ('154', '哈尔滨', '153', '255');
INSERT INTO `ecm_region` VALUES ('155', '齐齐哈尔', '153', '255');
INSERT INTO `ecm_region` VALUES ('156', '牡丹江', '153', '255');
INSERT INTO `ecm_region` VALUES ('157', '佳木斯', '153', '255');
INSERT INTO `ecm_region` VALUES ('158', '大庆', '153', '255');
INSERT INTO `ecm_region` VALUES ('159', '鸡西', '153', '255');
INSERT INTO `ecm_region` VALUES ('160', '伊春', '153', '255');
INSERT INTO `ecm_region` VALUES ('161', '双鸭山', '153', '255');
INSERT INTO `ecm_region` VALUES ('162', '七台河', '153', '255');
INSERT INTO `ecm_region` VALUES ('163', '鹤岗', '153', '255');
INSERT INTO `ecm_region` VALUES ('164', '黑河', '153', '255');
INSERT INTO `ecm_region` VALUES ('165', '绥化', '153', '255');
INSERT INTO `ecm_region` VALUES ('166', '大兴安岭', '153', '255');
INSERT INTO `ecm_region` VALUES ('167', '内蒙古自治区', '2', '255');
INSERT INTO `ecm_region` VALUES ('168', '呼和浩特市', '167', '255');
INSERT INTO `ecm_region` VALUES ('169', '包头市', '167', '255');
INSERT INTO `ecm_region` VALUES ('170', '乌海市', '167', '255');
INSERT INTO `ecm_region` VALUES ('171', '赤峰市', '167', '255');
INSERT INTO `ecm_region` VALUES ('172', '通辽市', '167', '255');
INSERT INTO `ecm_region` VALUES ('173', '鄂尔多斯市', '167', '255');
INSERT INTO `ecm_region` VALUES ('174', '呼伦贝尔市', '167', '255');
INSERT INTO `ecm_region` VALUES ('175', '巴彦淖尔市', '167', '255');
INSERT INTO `ecm_region` VALUES ('176', '乌兰察布市', '167', '255');
INSERT INTO `ecm_region` VALUES ('177', '锡林郭勒盟', '167', '255');
INSERT INTO `ecm_region` VALUES ('178', '兴安盟', '167', '255');
INSERT INTO `ecm_region` VALUES ('179', '阿拉善盟', '167', '255');
INSERT INTO `ecm_region` VALUES ('180', '江苏省', '2', '255');
INSERT INTO `ecm_region` VALUES ('181', '南京', '180', '255');
INSERT INTO `ecm_region` VALUES ('182', '苏州', '180', '255');
INSERT INTO `ecm_region` VALUES ('183', '无锡', '180', '255');
INSERT INTO `ecm_region` VALUES ('184', '常州', '180', '255');
INSERT INTO `ecm_region` VALUES ('185', '扬州', '180', '255');
INSERT INTO `ecm_region` VALUES ('186', '南通', '180', '255');
INSERT INTO `ecm_region` VALUES ('187', '镇江', '180', '255');
INSERT INTO `ecm_region` VALUES ('188', '泰州', '180', '255');
INSERT INTO `ecm_region` VALUES ('189', '淮安', '180', '255');
INSERT INTO `ecm_region` VALUES ('190', '徐州', '180', '255');
INSERT INTO `ecm_region` VALUES ('191', '盐城', '180', '255');
INSERT INTO `ecm_region` VALUES ('192', '宿迁', '180', '255');
INSERT INTO `ecm_region` VALUES ('193', '连云港', '180', '255');
INSERT INTO `ecm_region` VALUES ('194', '浙江省', '2', '255');
INSERT INTO `ecm_region` VALUES ('195', '杭州', '194', '255');
INSERT INTO `ecm_region` VALUES ('196', '宁波', '194', '255');
INSERT INTO `ecm_region` VALUES ('197', '温州', '194', '255');
INSERT INTO `ecm_region` VALUES ('198', '嘉兴', '194', '255');
INSERT INTO `ecm_region` VALUES ('199', '湖州', '194', '255');
INSERT INTO `ecm_region` VALUES ('200', '绍兴', '194', '255');
INSERT INTO `ecm_region` VALUES ('201', '金华', '194', '255');
INSERT INTO `ecm_region` VALUES ('202', '衢州', '194', '255');
INSERT INTO `ecm_region` VALUES ('203', '舟山', '194', '255');
INSERT INTO `ecm_region` VALUES ('204', '台州', '194', '255');
INSERT INTO `ecm_region` VALUES ('205', '丽水', '194', '255');
INSERT INTO `ecm_region` VALUES ('206', '安徽省', '2', '255');
INSERT INTO `ecm_region` VALUES ('207', '淮北市', '206', '255');
INSERT INTO `ecm_region` VALUES ('208', '合肥市', '206', '255');
INSERT INTO `ecm_region` VALUES ('209', '六安市', '206', '255');
INSERT INTO `ecm_region` VALUES ('210', '亳州市', '206', '255');
INSERT INTO `ecm_region` VALUES ('211', '宿州市', '206', '255');
INSERT INTO `ecm_region` VALUES ('212', '阜阳市', '206', '255');
INSERT INTO `ecm_region` VALUES ('213', '蚌埠市', '206', '255');
INSERT INTO `ecm_region` VALUES ('214', '淮南市', '206', '255');
INSERT INTO `ecm_region` VALUES ('215', '滁州市', '206', '255');
INSERT INTO `ecm_region` VALUES ('216', '巢湖市', '206', '255');
INSERT INTO `ecm_region` VALUES ('217', '芜湖市', '206', '255');
INSERT INTO `ecm_region` VALUES ('218', '马鞍山', '206', '255');
INSERT INTO `ecm_region` VALUES ('219', '安庆市', '206', '255');
INSERT INTO `ecm_region` VALUES ('220', '池州市', '206', '255');
INSERT INTO `ecm_region` VALUES ('221', '铜陵市', '206', '255');
INSERT INTO `ecm_region` VALUES ('222', '宣城市', '206', '255');
INSERT INTO `ecm_region` VALUES ('223', '黄山市', '206', '255');
INSERT INTO `ecm_region` VALUES ('224', '福建省', '2', '255');
INSERT INTO `ecm_region` VALUES ('225', '福州市', '224', '255');
INSERT INTO `ecm_region` VALUES ('226', '厦门市', '224', '255');
INSERT INTO `ecm_region` VALUES ('227', '莆田市', '224', '255');
INSERT INTO `ecm_region` VALUES ('228', '三明市', '224', '255');
INSERT INTO `ecm_region` VALUES ('229', '泉州市', '224', '255');
INSERT INTO `ecm_region` VALUES ('230', '漳州市', '224', '255');
INSERT INTO `ecm_region` VALUES ('231', '南平市', '224', '255');
INSERT INTO `ecm_region` VALUES ('232', '龙岩市', '224', '255');
INSERT INTO `ecm_region` VALUES ('233', '宁德市', '224', '255');
INSERT INTO `ecm_region` VALUES ('234', '江西省', '2', '255');
INSERT INTO `ecm_region` VALUES ('235', '南昌市', '234', '255');
INSERT INTO `ecm_region` VALUES ('236', '景德镇市', '234', '255');
INSERT INTO `ecm_region` VALUES ('237', '萍乡市', '234', '255');
INSERT INTO `ecm_region` VALUES ('238', '九江市', '234', '255');
INSERT INTO `ecm_region` VALUES ('239', '新余市', '234', '255');
INSERT INTO `ecm_region` VALUES ('240', '鹰潭市', '234', '255');
INSERT INTO `ecm_region` VALUES ('241', '赣州市', '234', '255');
INSERT INTO `ecm_region` VALUES ('242', '吉安市', '234', '255');
INSERT INTO `ecm_region` VALUES ('243', '宜春市', '234', '255');
INSERT INTO `ecm_region` VALUES ('244', '抚州市', '234', '255');
INSERT INTO `ecm_region` VALUES ('245', '上饶市', '234', '255');
INSERT INTO `ecm_region` VALUES ('246', '山东省', '2', '255');
INSERT INTO `ecm_region` VALUES ('247', '济南', '246', '255');
INSERT INTO `ecm_region` VALUES ('248', '青岛', '246', '255');
INSERT INTO `ecm_region` VALUES ('249', '淄博', '246', '255');
INSERT INTO `ecm_region` VALUES ('250', '泰安', '246', '255');
INSERT INTO `ecm_region` VALUES ('251', '济宁', '246', '255');
INSERT INTO `ecm_region` VALUES ('252', '德州', '246', '255');
INSERT INTO `ecm_region` VALUES ('253', '日照', '246', '255');
INSERT INTO `ecm_region` VALUES ('254', '潍坊', '246', '255');
INSERT INTO `ecm_region` VALUES ('255', '枣庄', '246', '255');
INSERT INTO `ecm_region` VALUES ('256', '临沂', '246', '255');
INSERT INTO `ecm_region` VALUES ('257', '莱芜', '246', '255');
INSERT INTO `ecm_region` VALUES ('258', '滨州', '246', '255');
INSERT INTO `ecm_region` VALUES ('259', '聊城', '246', '255');
INSERT INTO `ecm_region` VALUES ('260', '菏泽', '246', '255');
INSERT INTO `ecm_region` VALUES ('261', '烟台', '246', '255');
INSERT INTO `ecm_region` VALUES ('262', '威海', '246', '255');
INSERT INTO `ecm_region` VALUES ('263', '东营', '246', '255');
INSERT INTO `ecm_region` VALUES ('264', '河南省', '2', '255');
INSERT INTO `ecm_region` VALUES ('265', '郑州市', '264', '255');
INSERT INTO `ecm_region` VALUES ('266', '洛阳市', '264', '255');
INSERT INTO `ecm_region` VALUES ('267', '开封市', '264', '255');
INSERT INTO `ecm_region` VALUES ('268', '平顶山市', '264', '255');
INSERT INTO `ecm_region` VALUES ('269', '南阳市', '264', '255');
INSERT INTO `ecm_region` VALUES ('270', '焦作市', '264', '255');
INSERT INTO `ecm_region` VALUES ('271', '信阳市', '264', '255');
INSERT INTO `ecm_region` VALUES ('272', '济源市', '264', '255');
INSERT INTO `ecm_region` VALUES ('273', '周口市', '264', '255');
INSERT INTO `ecm_region` VALUES ('274', '安阳市', '264', '255');
INSERT INTO `ecm_region` VALUES ('275', '驻马店市', '264', '255');
INSERT INTO `ecm_region` VALUES ('276', '新乡市', '264', '255');
INSERT INTO `ecm_region` VALUES ('277', '鹤壁市', '264', '255');
INSERT INTO `ecm_region` VALUES ('278', '商丘市', '264', '255');
INSERT INTO `ecm_region` VALUES ('279', '漯河市', '264', '255');
INSERT INTO `ecm_region` VALUES ('280', '许昌市', '264', '255');
INSERT INTO `ecm_region` VALUES ('281', '三门峡市', '264', '255');
INSERT INTO `ecm_region` VALUES ('282', '濮阳市', '264', '255');
INSERT INTO `ecm_region` VALUES ('283', '湖北省', '2', '255');
INSERT INTO `ecm_region` VALUES ('284', '武汉', '283', '255');
INSERT INTO `ecm_region` VALUES ('285', '宜昌', '283', '255');
INSERT INTO `ecm_region` VALUES ('286', '荆州', '283', '255');
INSERT INTO `ecm_region` VALUES ('287', '十堰', '283', '255');
INSERT INTO `ecm_region` VALUES ('288', '襄樊', '283', '255');
INSERT INTO `ecm_region` VALUES ('289', '黄石', '283', '255');
INSERT INTO `ecm_region` VALUES ('290', '黄冈', '283', '255');
INSERT INTO `ecm_region` VALUES ('291', '恩施', '283', '255');
INSERT INTO `ecm_region` VALUES ('292', '荆门', '283', '255');
INSERT INTO `ecm_region` VALUES ('293', '咸宁', '283', '255');
INSERT INTO `ecm_region` VALUES ('294', '孝感', '283', '255');
INSERT INTO `ecm_region` VALUES ('295', '鄂州', '283', '255');
INSERT INTO `ecm_region` VALUES ('296', '天门', '283', '255');
INSERT INTO `ecm_region` VALUES ('297', '仙桃', '283', '255');
INSERT INTO `ecm_region` VALUES ('298', '随州', '283', '255');
INSERT INTO `ecm_region` VALUES ('299', '潜江', '283', '255');
INSERT INTO `ecm_region` VALUES ('300', '神农架', '283', '255');
INSERT INTO `ecm_region` VALUES ('301', '湖南省', '2', '255');
INSERT INTO `ecm_region` VALUES ('302', '长沙市', '301', '255');
INSERT INTO `ecm_region` VALUES ('303', '株洲市', '301', '255');
INSERT INTO `ecm_region` VALUES ('304', '湘潭市', '301', '255');
INSERT INTO `ecm_region` VALUES ('305', '邵阳市', '301', '255');
INSERT INTO `ecm_region` VALUES ('306', '吉首市', '301', '255');
INSERT INTO `ecm_region` VALUES ('307', '岳阳市', '301', '255');
INSERT INTO `ecm_region` VALUES ('308', '娄底市', '301', '255');
INSERT INTO `ecm_region` VALUES ('309', '怀化市', '301', '255');
INSERT INTO `ecm_region` VALUES ('310', '永州市', '301', '255');
INSERT INTO `ecm_region` VALUES ('311', '郴州市', '301', '255');
INSERT INTO `ecm_region` VALUES ('312', '常德市', '301', '255');
INSERT INTO `ecm_region` VALUES ('313', '衡阳市', '301', '255');
INSERT INTO `ecm_region` VALUES ('314', '益阳市', '301', '255');
INSERT INTO `ecm_region` VALUES ('315', '张家界', '301', '255');
INSERT INTO `ecm_region` VALUES ('316', '湘西州', '301', '255');
INSERT INTO `ecm_region` VALUES ('317', '广东省', '2', '255');
INSERT INTO `ecm_region` VALUES ('318', '广州', '317', '255');
INSERT INTO `ecm_region` VALUES ('319', '深圳', '317', '255');
INSERT INTO `ecm_region` VALUES ('320', '珠海', '317', '255');
INSERT INTO `ecm_region` VALUES ('321', '汕头', '317', '255');
INSERT INTO `ecm_region` VALUES ('322', '佛山', '317', '255');
INSERT INTO `ecm_region` VALUES ('323', '东莞', '317', '255');
INSERT INTO `ecm_region` VALUES ('324', '中山', '317', '255');
INSERT INTO `ecm_region` VALUES ('325', '江门', '317', '255');
INSERT INTO `ecm_region` VALUES ('326', '惠州', '317', '255');
INSERT INTO `ecm_region` VALUES ('327', '肇庆', '317', '255');
INSERT INTO `ecm_region` VALUES ('328', '阳江', '317', '255');
INSERT INTO `ecm_region` VALUES ('329', '韶关', '317', '255');
INSERT INTO `ecm_region` VALUES ('330', '河源', '317', '255');
INSERT INTO `ecm_region` VALUES ('331', '梅州', '317', '255');
INSERT INTO `ecm_region` VALUES ('332', '清远', '317', '255');
INSERT INTO `ecm_region` VALUES ('333', '云浮', '317', '255');
INSERT INTO `ecm_region` VALUES ('334', '茂名', '317', '255');
INSERT INTO `ecm_region` VALUES ('335', '汕尾', '317', '255');
INSERT INTO `ecm_region` VALUES ('336', '揭阳', '317', '255');
INSERT INTO `ecm_region` VALUES ('337', '潮州', '317', '255');
INSERT INTO `ecm_region` VALUES ('338', '湛江', '317', '255');
INSERT INTO `ecm_region` VALUES ('339', '海南省', '2', '255');
INSERT INTO `ecm_region` VALUES ('340', '海口市', '339', '255');
INSERT INTO `ecm_region` VALUES ('341', '三亚市', '339', '255');
INSERT INTO `ecm_region` VALUES ('342', '广西壮族自治区', '2', '255');
INSERT INTO `ecm_region` VALUES ('343', '南宁', '342', '255');
INSERT INTO `ecm_region` VALUES ('344', '柳州', '342', '255');
INSERT INTO `ecm_region` VALUES ('345', '桂林', '342', '255');
INSERT INTO `ecm_region` VALUES ('346', '梧州', '342', '255');
INSERT INTO `ecm_region` VALUES ('347', '北海', '342', '255');
INSERT INTO `ecm_region` VALUES ('348', '防城港', '342', '255');
INSERT INTO `ecm_region` VALUES ('349', '钦州', '342', '255');
INSERT INTO `ecm_region` VALUES ('350', '贵港', '342', '255');
INSERT INTO `ecm_region` VALUES ('351', '玉林', '342', '255');
INSERT INTO `ecm_region` VALUES ('352', '百色', '342', '255');
INSERT INTO `ecm_region` VALUES ('353', '贺州', '342', '255');
INSERT INTO `ecm_region` VALUES ('354', '河池', '342', '255');
INSERT INTO `ecm_region` VALUES ('355', '来宾', '342', '255');
INSERT INTO `ecm_region` VALUES ('356', '崇左', '342', '255');
INSERT INTO `ecm_region` VALUES ('357', '四川省', '2', '255');
INSERT INTO `ecm_region` VALUES ('358', '成都', '357', '255');
INSERT INTO `ecm_region` VALUES ('359', '自贡', '357', '255');
INSERT INTO `ecm_region` VALUES ('360', '攀枝花', '357', '255');
INSERT INTO `ecm_region` VALUES ('361', '泸州', '357', '255');
INSERT INTO `ecm_region` VALUES ('362', '德阳', '357', '255');
INSERT INTO `ecm_region` VALUES ('363', '绵阳', '357', '255');
INSERT INTO `ecm_region` VALUES ('364', '广元', '357', '255');
INSERT INTO `ecm_region` VALUES ('365', '遂宁', '357', '255');
INSERT INTO `ecm_region` VALUES ('366', '内江', '357', '255');
INSERT INTO `ecm_region` VALUES ('367', '资阳', '357', '255');
INSERT INTO `ecm_region` VALUES ('368', '乐山', '357', '255');
INSERT INTO `ecm_region` VALUES ('369', '眉山', '357', '255');
INSERT INTO `ecm_region` VALUES ('370', '南充', '357', '255');
INSERT INTO `ecm_region` VALUES ('371', '宜宾', '357', '255');
INSERT INTO `ecm_region` VALUES ('372', '广安', '357', '255');
INSERT INTO `ecm_region` VALUES ('373', '达州', '357', '255');
INSERT INTO `ecm_region` VALUES ('374', '巴中', '357', '255');
INSERT INTO `ecm_region` VALUES ('375', '雅安', '357', '255');
INSERT INTO `ecm_region` VALUES ('376', '阿坝', '357', '255');
INSERT INTO `ecm_region` VALUES ('377', '甘孜', '357', '255');
INSERT INTO `ecm_region` VALUES ('378', '凉山', '357', '255');
INSERT INTO `ecm_region` VALUES ('379', '贵州省', '2', '255');
INSERT INTO `ecm_region` VALUES ('380', '贵阳市', '379', '255');
INSERT INTO `ecm_region` VALUES ('381', '遵义市', '379', '255');
INSERT INTO `ecm_region` VALUES ('382', '安顺市', '379', '255');
INSERT INTO `ecm_region` VALUES ('383', '六盘水市', '379', '255');
INSERT INTO `ecm_region` VALUES ('384', '毕节地区', '379', '255');
INSERT INTO `ecm_region` VALUES ('385', '铜仁地区', '379', '255');
INSERT INTO `ecm_region` VALUES ('386', '黔东南州', '379', '255');
INSERT INTO `ecm_region` VALUES ('387', '黔南州', '379', '255');
INSERT INTO `ecm_region` VALUES ('388', '黔西南州', '379', '255');
INSERT INTO `ecm_region` VALUES ('389', '云南省', '2', '255');
INSERT INTO `ecm_region` VALUES ('390', '昆明市', '389', '255');
INSERT INTO `ecm_region` VALUES ('391', '曲靖市', '389', '255');
INSERT INTO `ecm_region` VALUES ('392', '红河哈尼族彝族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('393', '昭通市', '389', '255');
INSERT INTO `ecm_region` VALUES ('394', '玉溪市', '389', '255');
INSERT INTO `ecm_region` VALUES ('395', '德宏傣族景颇族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('396', '丽江市', '389', '255');
INSERT INTO `ecm_region` VALUES ('397', '迪庆藏族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('398', '文山壮族苗族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('399', '思茅市', '389', '255');
INSERT INTO `ecm_region` VALUES ('400', '大理白族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('401', '怒江傈僳族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('402', '保山市', '389', '255');
INSERT INTO `ecm_region` VALUES ('403', '楚雄彝族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('404', '西双版纳傣族自治州', '389', '255');
INSERT INTO `ecm_region` VALUES ('405', '临沧市', '389', '255');
INSERT INTO `ecm_region` VALUES ('406', '西藏自治区', '2', '255');
INSERT INTO `ecm_region` VALUES ('407', '拉萨', '406', '255');
INSERT INTO `ecm_region` VALUES ('408', '日喀则', '406', '255');
INSERT INTO `ecm_region` VALUES ('409', '林芝', '406', '255');
INSERT INTO `ecm_region` VALUES ('410', '山南', '406', '255');
INSERT INTO `ecm_region` VALUES ('411', '那曲', '406', '255');
INSERT INTO `ecm_region` VALUES ('412', '昌都', '406', '255');
INSERT INTO `ecm_region` VALUES ('413', '阿里', '406', '255');
INSERT INTO `ecm_region` VALUES ('414', '陕西省', '2', '255');
INSERT INTO `ecm_region` VALUES ('415', '西安市', '414', '255');
INSERT INTO `ecm_region` VALUES ('416', '铜川市', '414', '255');
INSERT INTO `ecm_region` VALUES ('417', '宝鸡市', '414', '255');
INSERT INTO `ecm_region` VALUES ('418', '咸阳市', '414', '255');
INSERT INTO `ecm_region` VALUES ('419', '渭南市', '414', '255');
INSERT INTO `ecm_region` VALUES ('420', '延安市', '414', '255');
INSERT INTO `ecm_region` VALUES ('421', '汉中市', '414', '255');
INSERT INTO `ecm_region` VALUES ('422', '榆林市', '414', '255');
INSERT INTO `ecm_region` VALUES ('423', '安康市', '414', '255');
INSERT INTO `ecm_region` VALUES ('424', '商洛市', '414', '255');
INSERT INTO `ecm_region` VALUES ('425', '甘肃省', '2', '255');
INSERT INTO `ecm_region` VALUES ('426', '兰州市', '425', '255');
INSERT INTO `ecm_region` VALUES ('427', '嘉峪关', '425', '255');
INSERT INTO `ecm_region` VALUES ('428', '金昌市', '425', '255');
INSERT INTO `ecm_region` VALUES ('429', '白银市', '425', '255');
INSERT INTO `ecm_region` VALUES ('430', '天水市', '425', '255');
INSERT INTO `ecm_region` VALUES ('431', '酒泉市', '425', '255');
INSERT INTO `ecm_region` VALUES ('432', '张掖市', '425', '255');
INSERT INTO `ecm_region` VALUES ('433', '武威市', '425', '255');
INSERT INTO `ecm_region` VALUES ('434', '定西市', '425', '255');
INSERT INTO `ecm_region` VALUES ('435', '陇南市', '425', '255');
INSERT INTO `ecm_region` VALUES ('436', '平凉市', '425', '255');
INSERT INTO `ecm_region` VALUES ('437', '庆阳市', '425', '255');
INSERT INTO `ecm_region` VALUES ('438', '临夏州', '425', '255');
INSERT INTO `ecm_region` VALUES ('439', '甘南州', '425', '255');
INSERT INTO `ecm_region` VALUES ('440', '青海省', '2', '255');
INSERT INTO `ecm_region` VALUES ('441', '西宁市', '440', '255');
INSERT INTO `ecm_region` VALUES ('442', '海东行署', '440', '255');
INSERT INTO `ecm_region` VALUES ('443', '海北藏族自治州', '440', '255');
INSERT INTO `ecm_region` VALUES ('444', '海南藏族自治州', '440', '255');
INSERT INTO `ecm_region` VALUES ('445', '海西州', '440', '255');
INSERT INTO `ecm_region` VALUES ('446', '黄南藏族自治州', '440', '255');
INSERT INTO `ecm_region` VALUES ('447', '玉树藏族自治州', '440', '255');
INSERT INTO `ecm_region` VALUES ('448', '果洛藏族自治州', '440', '255');
INSERT INTO `ecm_region` VALUES ('449', '宁夏回族自治区', '2', '255');
INSERT INTO `ecm_region` VALUES ('450', '银川市', '449', '255');
INSERT INTO `ecm_region` VALUES ('451', '石嘴山市', '449', '255');
INSERT INTO `ecm_region` VALUES ('452', '吴忠市', '449', '255');
INSERT INTO `ecm_region` VALUES ('453', '固原市', '449', '255');
INSERT INTO `ecm_region` VALUES ('454', '中卫市', '449', '255');
INSERT INTO `ecm_region` VALUES ('455', '新疆维吾尔自治区', '2', '255');
INSERT INTO `ecm_region` VALUES ('456', '伊犁哈萨克自治州', '455', '255');
INSERT INTO `ecm_region` VALUES ('457', '乌鲁木齐市', '455', '255');
INSERT INTO `ecm_region` VALUES ('458', '昌吉回族自治州', '455', '255');
INSERT INTO `ecm_region` VALUES ('459', '石河子市', '455', '255');
INSERT INTO `ecm_region` VALUES ('460', '克拉玛依市', '455', '255');
INSERT INTO `ecm_region` VALUES ('461', '阿勒泰地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('462', '博尔塔拉蒙古自治州', '455', '255');
INSERT INTO `ecm_region` VALUES ('463', '塔城地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('464', '和田地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('465', '克孜勒苏克尔克孜自治州', '455', '255');
INSERT INTO `ecm_region` VALUES ('466', '喀什地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('467', '阿克苏地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('468', '巴音郭楞蒙古自治州', '455', '255');
INSERT INTO `ecm_region` VALUES ('469', '吐鲁番地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('470', '哈密地区', '455', '255');
INSERT INTO `ecm_region` VALUES ('471', '五家渠市', '455', '255');
INSERT INTO `ecm_region` VALUES ('472', '阿拉尔市', '455', '255');
INSERT INTO `ecm_region` VALUES ('473', '图木舒克市', '455', '255');
INSERT INTO `ecm_region` VALUES ('474', '香港特别行政区', '2', '255');
INSERT INTO `ecm_region` VALUES ('475', '澳门特别行政区', '2', '255');
INSERT INTO `ecm_region` VALUES ('476', '台湾省', '2', '255');

-- ----------------------------
-- Table structure for `ecm_scategory`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_scategory`;
CREATE TABLE `ecm_scategory` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`cate_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_scategory
-- ----------------------------
INSERT INTO `ecm_scategory` VALUES ('1', '服饰', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('2', '女装/女士精品', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('3', '男装', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('4', '女鞋', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('5', '流行男鞋', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('6', '运动鞋', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('7', '女士内衣/男士内衣/家居服', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('8', '箱包皮具/热销女包/男包', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('9', '运动服/运动包/颈环配件', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('10', '服饰配件/皮带/帽子/围巾', '1', '255');
INSERT INTO `ecm_scategory` VALUES ('11', '手机/数码/办公/家电', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('12', '手机', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('13', '国货精品手机', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('14', '笔记本电脑', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('15', '电脑硬件/台式整机/网络设备', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('16', 'MP3/MP4/iPod/录音笔', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('17', '数码相机/摄像机/图形冲印', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('18', '3C数码配件市场', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('19', '网络服务/电脑软件', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('20', '闪存卡/U盘/移动存储', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('21', '电玩/配件/游戏/攻略', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('22', '办公设备/文具/耗材', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('23', '影音电器', '11', '255');
INSERT INTO `ecm_scategory` VALUES ('24', '美容护肤/个人护理', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('25', '美容护肤/美体/精油', '24', '255');
INSERT INTO `ecm_scategory` VALUES ('26', '彩妆/香水/美发/工具', '24', '255');
INSERT INTO `ecm_scategory` VALUES ('27', '个人护理/保健/按摩器材', '24', '255');
INSERT INTO `ecm_scategory` VALUES ('28', '家居/母婴/食品', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('29', '居家日用/厨房餐饮/卫浴洗浴', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('30', '时尚家饰/工艺品/十字绣', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('31', '家具/家具定制/宜家代购', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('32', '家纺/床品/地毯/布艺', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('33', '装潢/灯具/五金/安防/卫浴', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('34', '保健食品', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('35', '食品/茶叶/零食/特产', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('36', '奶粉/尿片/母婴用品', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('37', '益智玩具/童车/童床/书包', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('38', '童装/童鞋/孕妇装', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('39', '宠物/宠物食品及用品', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('40', '厨房电器', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('41', '生活电器', '28', '255');
INSERT INTO `ecm_scategory` VALUES ('42', '文体/汽车', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('43', '书籍/杂志/报纸', '42', '255');
INSERT INTO `ecm_scategory` VALUES ('44', '音乐/影视/明星/乐器', '42', '255');
INSERT INTO `ecm_scategory` VALUES ('45', '运动/瑜伽/健身/球迷用品', '42', '255');
INSERT INTO `ecm_scategory` VALUES ('46', '户外/登山/野营/涉水', '42', '255');
INSERT INTO `ecm_scategory` VALUES ('47', '汽车/配件/改装/摩托/自行车', '42', '255');
INSERT INTO `ecm_scategory` VALUES ('48', '珠宝/首饰', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('49', '饰品/流行首饰/时尚饰品', '48', '255');
INSERT INTO `ecm_scategory` VALUES ('50', '珠宝/钻石/翡翠/黄金', '48', '255');
INSERT INTO `ecm_scategory` VALUES ('51', '品牌手表/流行手表', '48', '255');
INSERT INTO `ecm_scategory` VALUES ('52', '收藏/爱好', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('53', '古董/邮币/字画/收藏', '52', '255');
INSERT INTO `ecm_scategory` VALUES ('54', '玩具/模型/娃娃/人偶', '52', '255');
INSERT INTO `ecm_scategory` VALUES ('55', 'ZIPPO/瑞士军刀/眼镜', '52', '255');
INSERT INTO `ecm_scategory` VALUES ('56', '游戏/话费', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('57', '腾讯QQ专区', '56', '255');
INSERT INTO `ecm_scategory` VALUES ('58', '网游装备/游戏币/帐号/代练', '56', '255');
INSERT INTO `ecm_scategory` VALUES ('59', '网络游戏点卡', '56', '255');
INSERT INTO `ecm_scategory` VALUES ('60', '移动/联通/小灵通充值中心', '56', '255');
INSERT INTO `ecm_scategory` VALUES ('61', 'IP卡/网络电话/手机号码', '56', '255');
INSERT INTO `ecm_scategory` VALUES ('62', '生活服务', '0', '255');
INSERT INTO `ecm_scategory` VALUES ('63', '成人用品/避孕用品/情趣内衣', '62', '255');
INSERT INTO `ecm_scategory` VALUES ('64', '网店装修/物流快递/图片存储', '62', '255');
INSERT INTO `ecm_scategory` VALUES ('65', '鲜花速递/蛋糕配送/园艺花艺', '62', '255');
INSERT INTO `ecm_scategory` VALUES ('66', '演出/旅游/吃喝玩乐折扣券', '62', '255');

-- ----------------------------
-- Table structure for `ecm_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_sessions`;
CREATE TABLE `ecm_sessions` (
  `sesskey` char(32) NOT NULL DEFAULT '',
  `expiry` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `adminid` int(11) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `data` char(255) NOT NULL DEFAULT '',
  `is_overflow` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_sessions
-- ----------------------------
INSERT INTO `ecm_sessions` VALUES ('dcc57d7d41c98b74e24c18afad239547', '1438313609', '0', '0', '127.0.0.1', '', '1');
INSERT INTO `ecm_sessions` VALUES ('ec5f19df2b6f0ef103db3bc997892d99', '1438583712', '0', '0', '127.0.0.1', '', '1');
INSERT INTO `ecm_sessions` VALUES ('06a0502d9577ccf9d4d3d86f3edb5da3', '1438566847', '0', '0', '127.0.0.1', '', '0');
INSERT INTO `ecm_sessions` VALUES ('3f033e7ef3ba9edd1bba5a87c3f6f8fb', '1438566888', '0', '0', '127.0.0.1', '', '0');
INSERT INTO `ecm_sessions` VALUES ('77227b73f390352243d261d773eddd75', '1438574378', '0', '0', '127.0.0.1', '', '0');
INSERT INTO `ecm_sessions` VALUES ('6e6cb40b390009c6776b7a0079282c26', '1438583395', '0', '0', '127.0.0.1', '', '0');
INSERT INTO `ecm_sessions` VALUES ('3612c8c8d230a699fc764b99a2c75501', '1438583416', '0', '0', '127.0.0.1', '', '0');
INSERT INTO `ecm_sessions` VALUES ('04417f7f73ae030f8ec049fd24e7478d', '1438756075', '0', '0', '127.0.0.1', '', '1');

-- ----------------------------
-- Table structure for `ecm_sessions_data`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_sessions_data`;
CREATE TABLE `ecm_sessions_data` (
  `sesskey` varchar(32) NOT NULL DEFAULT '',
  `expiry` int(11) NOT NULL DEFAULT '0',
  `data` longtext NOT NULL,
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_sessions_data
-- ----------------------------
INSERT INTO `ecm_sessions_data` VALUES ('dcc57d7d41c98b74e24c18afad239547', '1438313609', 'admin_info|a:5:{s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:5:\"admin\";s:8:\"reg_time\";s:10:\"1438306573\";s:10:\"last_login\";N;s:7:\"last_ip\";N;}user_info|a:6:{s:7:\"user_id\";s:1:\"2\";s:9:\"user_name\";s:6:\"guobao\";s:8:\"reg_time\";s:10:\"1438307455\";s:10:\"last_login\";s:10:\"1438307717\";s:7:\"last_ip\";s:9:\"127.0.0.1\";s:8:\"store_id\";N;}');
INSERT INTO `ecm_sessions_data` VALUES ('ec5f19df2b6f0ef103db3bc997892d99', '1438583712', 'admin_info|a:5:{s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:5:\"admin\";s:8:\"reg_time\";s:10:\"1438306573\";s:10:\"last_login\";s:10:\"1438307755\";s:7:\"last_ip\";s:9:\"127.0.0.1\";}user_info|a:6:{s:7:\"user_id\";s:1:\"2\";s:9:\"user_name\";s:6:\"guobao\";s:8:\"reg_time\";s:10:\"1438307455\";s:10:\"last_login\";s:10:\"1438307764\";s:7:\"last_ip\";s:9:\"127.0.0.1\";s:8:\"store_id\";s:1:\"2\";}');
INSERT INTO `ecm_sessions_data` VALUES ('04417f7f73ae030f8ec049fd24e7478d', '1438756075', 'user_info|a:6:{s:7:\"user_id\";s:1:\"2\";s:9:\"user_name\";s:6:\"guobao\";s:8:\"reg_time\";s:10:\"1438307455\";s:10:\"last_login\";s:10:\"1438565509\";s:7:\"last_ip\";s:9:\"127.0.0.1\";s:8:\"store_id\";s:1:\"2\";}admin_info|a:5:{s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:5:\"admin\";s:8:\"reg_time\";s:10:\"1438306573\";s:10:\"last_login\";s:10:\"1438563882\";s:7:\"last_ip\";s:9:\"127.0.0.1\";}');

-- ----------------------------
-- Table structure for `ecm_sgrade`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_sgrade`;
CREATE TABLE `ecm_sgrade` (
  `grade_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(60) NOT NULL DEFAULT '',
  `goods_limit` int(10) unsigned NOT NULL DEFAULT '0',
  `space_limit` int(10) unsigned NOT NULL DEFAULT '0',
  `skin_limit` int(10) unsigned NOT NULL DEFAULT '0',
  `charge` varchar(100) NOT NULL DEFAULT '',
  `need_confirm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `functions` varchar(255) DEFAULT NULL,
  `skins` text NOT NULL,
  `sort_order` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`grade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_sgrade
-- ----------------------------
INSERT INTO `ecm_sgrade` VALUES ('1', '系统默认', '5', '2', '1', '100元/年', '0', '测试用户请选择“默认等级”，可以立即开通。', null, 'default|default', '255');
INSERT INTO `ecm_sgrade` VALUES ('2', '认证店铺', '200', '1000', '5', '200元/年', '1', '申请时需要上传身份证和营业执照复印件', 'editor_multimedia,coupon,groupbuy', 'default|default,default|style1,default|style2,default|style3,default|style4', '255');

-- ----------------------------
-- Table structure for `ecm_shipping`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_shipping`;
CREATE TABLE `ecm_shipping` (
  `shipping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shipping_name` varchar(100) NOT NULL DEFAULT '',
  `shipping_desc` varchar(255) DEFAULT NULL,
  `first_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `step_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_regions` text,
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`shipping_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_shipping
-- ----------------------------
INSERT INTO `ecm_shipping` VALUES ('1', '3', '平邮', '普通包裹邮寄', '5.00', '5.00', null, '1', '255');
INSERT INTO `ecm_shipping` VALUES ('2', '3', '快递', '急速快递公司', '10.00', '10.00', 'a:2:{i:3;s:11:\"中国	北京市\";i:41;s:11:\"中国	上海市\";}', '1', '1');
INSERT INTO `ecm_shipping` VALUES ('3', '3', 'EMS', '中国邮政特快专递，全国范围可达', '20.00', '10.00', null, '1', '3');
INSERT INTO `ecm_shipping` VALUES ('4', '2', '顺丰', '', '20.00', '0.00', null, '1', '255');

-- ----------------------------
-- Table structure for `ecm_store`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_store`;
CREATE TABLE `ecm_store` (
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_name` varchar(100) NOT NULL DEFAULT '',
  `owner_name` varchar(60) NOT NULL DEFAULT '',
  `owner_card` varchar(60) NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `region_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(20) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `sgrade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `apply_remark` varchar(255) NOT NULL DEFAULT '',
  `credit_value` int(10) NOT NULL DEFAULT '0',
  `praise_rate` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `domain` varchar(60) DEFAULT NULL,
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `close_reason` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned DEFAULT NULL,
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `certification` varchar(255) DEFAULT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `recommended` tinyint(4) NOT NULL DEFAULT '0',
  `theme` varchar(60) NOT NULL DEFAULT '',
  `store_banner` varchar(255) DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `description` text,
  `image_1` varchar(255) NOT NULL DEFAULT '',
  `image_2` varchar(255) NOT NULL DEFAULT '',
  `image_3` varchar(255) NOT NULL DEFAULT '',
  `im_qq` varchar(60) NOT NULL DEFAULT '',
  `im_ww` varchar(60) NOT NULL DEFAULT '',
  `im_msn` varchar(60) NOT NULL DEFAULT '',
  `enable_groupbuy` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `enable_radar` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`store_id`),
  KEY `store_name` (`store_name`),
  KEY `owner_name` (`owner_name`),
  KEY `region_id` (`region_id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_store
-- ----------------------------
INSERT INTO `ecm_store` VALUES ('3', '演示店铺', '张老板', '123456789012345678', '9', '中国	北京市	海淀', '人民大街16号', '100088', '010-88886666-8866', '2', '', '6', '85.71', '', '1', '', '1249543819', '0', '', '0', '1', '', null, null, '', '', '', '', '', '', '', '0', '1');
INSERT INTO `ecm_store` VALUES ('2', '国宝的店铺', '姑伯翱', '2132146846541563', '44', '中国	上海市	长宁区', '测试测试测试测试测试', '230000', '1821212121', '2', '', '0', '0.00', '', '1', '', '1438309790', '0', 'autonym,material', '0', '1', '', null, null, null, 'data/files/mall/application/store_2_1.jpg', 'data/files/mall/application/store_2_2.jpg', '', '', '', '', '0', '1');

-- ----------------------------
-- Table structure for `ecm_uploaded_file`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_uploaded_file`;
CREATE TABLE `ecm_uploaded_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_type` varchar(60) NOT NULL DEFAULT '',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL DEFAULT '',
  `file_path` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `belong` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_uploaded_file
-- ----------------------------
INSERT INTO `ecm_uploaded_file` VALUES ('3', '3', 'image/jpeg', '12362', 'e312229073211613.jpg', 'data/files/store_2/goods_179/200908060822598478.jpg', '1249546979', '2', '1');
INSERT INTO `ecm_uploaded_file` VALUES ('4', '3', 'image/jpeg', '12719', '4804c0f3850ea00f.jpg', 'data/files/store_2/goods_197/200908060823178267.jpg', '1249546997', '2', '1');
INSERT INTO `ecm_uploaded_file` VALUES ('5', '3', 'image/jpeg', '7452', '0debd9a9e2670ee3.jpg', 'data/files/store_2/goods_9/200908060823294001.jpg', '1249547009', '2', '1');
INSERT INTO `ecm_uploaded_file` VALUES ('6', '3', 'image/jpeg', '11303', 'cdd6104486b110e6.jpg', 'data/files/store_2/goods_25/200908060823452419.jpg', '1249547025', '2', '1');
INSERT INTO `ecm_uploaded_file` VALUES ('7', '3', 'image/jpeg', '11989', 'ab4ccb7023198236.jpg', 'data/files/store_2/goods_32/200908060823523184.jpg', '1249547032', '2', '1');
INSERT INTO `ecm_uploaded_file` VALUES ('8', '3', 'image/jpeg', '9776', '66253ee68af3b7c8.jpg', 'data/files/store_2/goods_43/200908060824034431.jpg', '1249547043', '2', '1');
INSERT INTO `ecm_uploaded_file` VALUES ('9', '3', 'image/jpeg', '15810', '20c422381519c2c2.jpg', 'data/files/store_2/goods_131/200908060828517782.jpg', '1249547331', '2', '2');
INSERT INTO `ecm_uploaded_file` VALUES ('10', '3', 'image/jpeg', '17379', '4139a3d3b0c4b37e.jpg', 'data/files/store_2/goods_150/200908060829102798.jpg', '1249547350', '2', '2');
INSERT INTO `ecm_uploaded_file` VALUES ('11', '3', 'image/jpeg', '19656', '42d91ab1b33192de.jpg', 'data/files/store_2/goods_170/200908060829308411.jpg', '1249547370', '2', '2');
INSERT INTO `ecm_uploaded_file` VALUES ('12', '3', 'image/jpeg', '9576', 'b1b9851f8a31e92d.jpg', 'data/files/store_2/goods_107/200908060831473107.jpg', '1249547507', '2', '3');
INSERT INTO `ecm_uploaded_file` VALUES ('13', '3', 'image/jpeg', '8929', 'bf4e91fd54345a9c.jpg', 'data/files/store_2/goods_115/200908060831559591.jpg', '1249547515', '2', '3');
INSERT INTO `ecm_uploaded_file` VALUES ('14', '3', 'image/jpeg', '6114', '45493a6f6fec84f2.jpg', 'data/files/store_2/goods_140/200908060832202677.jpg', '1249547540', '2', '3');
INSERT INTO `ecm_uploaded_file` VALUES ('15', '3', 'image/jpeg', '6561', '63510a7451dcacab.jpg', 'data/files/store_2/goods_147/200908060832272714.jpg', '1249547548', '2', '3');
INSERT INTO `ecm_uploaded_file` VALUES ('16', '3', 'image/jpeg', '22367', '8182647915c83d33.jpg', 'data/files/store_2/goods_66/200908060834263919.jpg', '1249547666', '2', '4');
INSERT INTO `ecm_uploaded_file` VALUES ('17', '3', 'image/jpeg', '22319', '37f593db08b31139.jpg', 'data/files/store_2/goods_87/200908060834479577.jpg', '1249547687', '2', '4');
INSERT INTO `ecm_uploaded_file` VALUES ('18', '3', 'image/jpeg', '20131', '816effe5591ca815.jpg', 'data/files/store_2/goods_105/200908060835054315.jpg', '1249547705', '2', '4');
INSERT INTO `ecm_uploaded_file` VALUES ('19', '3', 'image/jpeg', '20031', '45e6c54d9b324696.jpg', 'data/files/store_2/goods_125/200908060835258625.jpg', '1249547725', '2', '4');
INSERT INTO `ecm_uploaded_file` VALUES ('20', '3', 'image/jpeg', '13511', 'a3836dd5e6541b68.jpg', 'data/files/store_2/goods_141/200908060835411590.jpg', '1249547741', '2', '4');
INSERT INTO `ecm_uploaded_file` VALUES ('21', '3', 'image/jpeg', '19887', '16b171b2bb9956a1.jpg', 'data/files/store_2/goods_155/200908060835558086.jpg', '1249547755', '2', '4');
INSERT INTO `ecm_uploaded_file` VALUES ('22', '3', 'image/jpeg', '14406', '81c4c33a4abe35a3.jpg', 'data/files/store_2/goods_70/200908060837502713.jpg', '1249547870', '2', '5');
INSERT INTO `ecm_uploaded_file` VALUES ('23', '3', 'image/jpeg', '18618', 'ab46c77e6bf8c22a.jpg', 'data/files/store_2/goods_95/200908060841358079.jpg', '1249548095', '2', '6');
INSERT INTO `ecm_uploaded_file` VALUES ('24', '3', 'image/jpeg', '19235', '8f46f0a94d7d8e4b.jpg', 'data/files/store_2/goods_108/200908060841484621.jpg', '1249548108', '2', '6');
INSERT INTO `ecm_uploaded_file` VALUES ('25', '3', 'image/jpeg', '20369', '940f52830b31759a.jpg', 'data/files/store_2/goods_124/200908060842042302.jpg', '1249548124', '2', '6');
INSERT INTO `ecm_uploaded_file` VALUES ('26', '3', 'image/jpeg', '10992', '17035a2c04152769.jpg', 'data/files/store_2/goods_186/200908060906263554.jpg', '1249549586', '2', '7');
INSERT INTO `ecm_uploaded_file` VALUES ('27', '3', 'image/jpeg', '11091', '1ef4f5b42972ed6d.jpg', 'data/files/store_2/goods_13/200908060906532764.jpg', '1249549613', '2', '7');
INSERT INTO `ecm_uploaded_file` VALUES ('28', '3', 'image/jpeg', '11786', '849f0be16991cdf0.jpg', 'data/files/store_2/goods_36/200908060907164774.jpg', '1249549636', '2', '7');
INSERT INTO `ecm_uploaded_file` VALUES ('29', '3', 'image/jpeg', '11795', '1f142f7aca2b77ba.jpg', 'data/files/store_2/goods_187/200908060909472569.jpg', '1249549787', '2', '8');
INSERT INTO `ecm_uploaded_file` VALUES ('30', '3', 'image/jpeg', '11602', '0806158a947e9e0e.jpg', 'data/files/store_2/goods_2/200908060910023266.jpg', '1249549802', '2', '8');
INSERT INTO `ecm_uploaded_file` VALUES ('31', '3', 'image/jpeg', '8543', '03b2a4603b85e820.jpg', 'data/files/store_2/goods_98/200908060911381037.jpg', '1249549898', '2', '9');
INSERT INTO `ecm_uploaded_file` VALUES ('32', '3', 'image/jpeg', '16022', '521bf6e6c8589e5e.jpg', 'data/files/store_2/goods_128/200908060912082754.jpg', '1249549928', '2', '9');
INSERT INTO `ecm_uploaded_file` VALUES ('33', '3', 'image/jpeg', '16935', '7b57b81be56d8cb0.jpg', 'data/files/store_2/goods_69/200908060914291406.jpg', '1249550069', '2', '10');
INSERT INTO `ecm_uploaded_file` VALUES ('34', '3', 'image/jpeg', '17495', '47f458fa00e4a99f.jpg', 'data/files/store_2/goods_82/200908060914426191.jpg', '1249550082', '2', '10');
INSERT INTO `ecm_uploaded_file` VALUES ('35', '3', 'image/jpeg', '13592', '55217d17c0a54e5c.jpg', 'data/files/store_2/goods_94/200908060914542008.jpg', '1249550094', '2', '10');
INSERT INTO `ecm_uploaded_file` VALUES ('36', '3', 'image/jpeg', '17705', '63788145012d6b67.jpg', 'data/files/store_2/goods_126/200908060915269026.jpg', '1249550126', '2', '10');
INSERT INTO `ecm_uploaded_file` VALUES ('37', '3', 'image/jpeg', '15711', '95a200317cab0127.jpg', 'data/files/store_2/goods_33/200908060917132087.jpg', '1249550233', '2', '11');
INSERT INTO `ecm_uploaded_file` VALUES ('38', '3', 'image/jpeg', '13899', 'f78e1c41eb90dad8.jpg', 'data/files/store_2/goods_123/200908060918436837.jpg', '1249550323', '2', '12');
INSERT INTO `ecm_uploaded_file` VALUES ('39', '3', 'image/jpeg', '11798', 'c11d579c21a32178.jpg', 'data/files/store_2/goods_142/200908060919027810.jpg', '1249550342', '2', '12');
INSERT INTO `ecm_uploaded_file` VALUES ('40', '3', 'image/jpeg', '11142', '8aa9cf1cbb49a683.jpg', 'data/files/store_2/goods_24/200908060920245196.jpg', '1249550424', '2', '13');
INSERT INTO `ecm_uploaded_file` VALUES ('41', '3', 'image/jpeg', '13472', '3b108b157c7dc941.jpg', 'data/files/store_2/goods_43/200908060920437979.jpg', '1249550443', '2', '13');
INSERT INTO `ecm_uploaded_file` VALUES ('42', '3', 'image/jpeg', '18693', '39388f9f7b055bad.jpg', 'data/files/store_2/goods_54/200908060920546675.jpg', '1249550454', '2', '13');
INSERT INTO `ecm_uploaded_file` VALUES ('43', '3', 'image/jpeg', '16603', '0ff8c40a74c9a226.jpg', 'data/files/store_2/goods_128/200908060922084636.jpg', '1249550528', '2', '14');
INSERT INTO `ecm_uploaded_file` VALUES ('44', '3', 'image/jpeg', '14549', '7a8e22cc60f7096e.jpg', 'data/files/store_2/goods_141/200908060922218002.jpg', '1249550541', '2', '14');
INSERT INTO `ecm_uploaded_file` VALUES ('45', '3', 'image/jpeg', '19331', '587a5e6b23b02e02.jpg', 'data/files/store_2/goods_29/200908060923496883.jpg', '1249550629', '2', '14');
INSERT INTO `ecm_uploaded_file` VALUES ('46', '3', 'image/jpeg', '14786', '62af45e8928f3835.jpg', 'data/files/store_2/goods_147/200908060925471585.jpg', '1249550747', '2', '15');
INSERT INTO `ecm_uploaded_file` VALUES ('47', '3', 'image/jpeg', '14423', 'f16628f7bb81e7a3.jpg', 'data/files/store_2/goods_67/200908060927474675.jpg', '1249550867', '2', '16');
INSERT INTO `ecm_uploaded_file` VALUES ('48', '3', 'image/jpeg', '17180', '7c86857a689162fe.jpg', 'data/files/store_2/goods_121/200908060932011437.jpg', '1249551121', '2', '17');
INSERT INTO `ecm_uploaded_file` VALUES ('49', '3', 'image/jpeg', '15260', 'ab69f24b4f3945e0.jpg', 'data/files/store_2/goods_84/200908060934444841.jpg', '1249551284', '2', '17');
INSERT INTO `ecm_uploaded_file` VALUES ('50', '3', 'image/jpeg', '16859', 'e77d1081c91645a8.jpg', 'data/files/store_2/goods_195/200908060936352784.jpg', '1249551395', '2', '18');
INSERT INTO `ecm_uploaded_file` VALUES ('51', '3', 'image/jpeg', '13430', '7bc43095c465ebf0.jpg', 'data/files/store_2/goods_8/200908060936481674.jpg', '1249551408', '2', '18');
INSERT INTO `ecm_uploaded_file` VALUES ('52', '3', 'image/jpeg', '14187', 'b6781ab419a5089a.jpg', 'data/files/store_2/goods_24/200908060937048695.jpg', '1249551424', '2', '18');
INSERT INTO `ecm_uploaded_file` VALUES ('53', '3', 'image/jpeg', '12901', '30f7b98ad565c2d0.jpg', 'data/files/store_2/goods_109/200908060938292631.jpg', '1249551509', '2', '19');
INSERT INTO `ecm_uploaded_file` VALUES ('54', '3', 'image/jpeg', '12910', 'd55a5ba6fed7e162.jpg', 'data/files/store_2/goods_124/200908060938443027.jpg', '1249551524', '2', '19');
INSERT INTO `ecm_uploaded_file` VALUES ('55', '3', 'image/jpeg', '16186', '5e8e59bd6b611024.jpg', 'data/files/store_2/goods_142/200908060939026685.jpg', '1249551542', '2', '19');
INSERT INTO `ecm_uploaded_file` VALUES ('56', '3', 'image/jpeg', '9265', 'f02b3f851f57f2ce.jpg', 'data/files/store_2/goods_143/200908060942233830.jpg', '1249551743', '2', '20');
INSERT INTO `ecm_uploaded_file` VALUES ('57', '3', 'image/jpeg', '8483', 'd55955141b9a1f90.jpg', 'data/files/store_2/goods_156/200908060942363092.jpg', '1249551756', '2', '20');
INSERT INTO `ecm_uploaded_file` VALUES ('58', '3', 'image/jpeg', '7043', 'be88bb9b556e2009.jpg', 'data/files/store_2/goods_166/200908060942462672.jpg', '1249551766', '2', '20');
INSERT INTO `ecm_uploaded_file` VALUES ('59', '3', 'image/jpeg', '11456', '1730d57edea6a55c.jpg', 'data/files/store_2/goods_25/200908060950258122.jpg', '1249552225', '2', '21');
INSERT INTO `ecm_uploaded_file` VALUES ('60', '3', 'image/jpeg', '13215', 'e528ca3eb5748a3c.jpg', 'data/files/store_2/goods_39/200908060950399637.jpg', '1249552239', '2', '21');
INSERT INTO `ecm_uploaded_file` VALUES ('61', '3', 'image/jpeg', '13113', '76a7718b471d6d93.jpg', 'data/files/store_2/goods_55/200908060950555738.jpg', '1249552255', '2', '21');
INSERT INTO `ecm_uploaded_file` VALUES ('62', '3', 'image/jpeg', '11796', '2e1daf9d76edce5b.jpg', 'data/files/store_2/goods_67/200908060951072027.jpg', '1249552267', '2', '21');
INSERT INTO `ecm_uploaded_file` VALUES ('63', '3', 'image/jpeg', '10290', 'b40cc60772351b06.jpg', 'data/files/store_2/goods_147/200908060952274906.jpg', '1249552347', '2', '22');
INSERT INTO `ecm_uploaded_file` VALUES ('64', '3', 'image/jpeg', '11026', '4bdd992c49d35190.jpg', 'data/files/store_2/goods_157/200908060952376888.jpg', '1249552357', '2', '22');
INSERT INTO `ecm_uploaded_file` VALUES ('65', '3', 'image/jpeg', '16541', '79ef35e6f2e347fa.jpg', 'data/files/store_2/goods_64/200908060954245662.jpg', '1249552464', '2', '23');
INSERT INTO `ecm_uploaded_file` VALUES ('66', '3', 'image/jpeg', '16314', '4eed1f55e152588a.jpg', 'data/files/store_2/goods_72/200908060954323544.jpg', '1249552472', '2', '23');
INSERT INTO `ecm_uploaded_file` VALUES ('67', '3', 'image/jpeg', '23479', 'c9e640d5eb45e295.jpg', 'data/files/store_2/goods_86/200908060954465326.jpg', '1249552486', '2', '23');
INSERT INTO `ecm_uploaded_file` VALUES ('68', '3', 'image/jpeg', '16676', '5278b03233b52a17.jpg', 'data/files/store_2/goods_20/200908060957002218.jpg', '1249552620', '2', '24');
INSERT INTO `ecm_uploaded_file` VALUES ('69', '3', 'image/jpeg', '12124', '7b2d5ffeff2b1f0e.jpg', 'data/files/store_2/goods_139/200908060958592106.jpg', '1249552739', '2', '25');
INSERT INTO `ecm_uploaded_file` VALUES ('70', '3', 'image/jpeg', '14064', '73b603b1799e1457.jpg', 'data/files/store_2/goods_151/200908060959114414.jpg', '1249552751', '2', '25');
INSERT INTO `ecm_uploaded_file` VALUES ('71', '3', 'image/jpeg', '14539', '47f6ec2e8d9b2c82.jpg', 'data/files/store_2/goods_166/200908060959265796.jpg', '1249552766', '2', '25');
INSERT INTO `ecm_uploaded_file` VALUES ('72', '3', 'image/jpeg', '10242', '7905b61346259857.jpg', 'data/files/store_2/goods_47/200908061000474424.jpg', '1249552847', '2', '26');
INSERT INTO `ecm_uploaded_file` VALUES ('73', '3', 'image/jpeg', '11232', 'ae4916f90e5227e9.jpg', 'data/files/store_2/goods_57/200908061000576924.jpg', '1249552857', '2', '26');
INSERT INTO `ecm_uploaded_file` VALUES ('74', '3', 'image/jpeg', '12251', '25e53455ff1b63a4.jpg', 'data/files/store_2/goods_71/200908061001114276.jpg', '1249552871', '2', '26');
INSERT INTO `ecm_uploaded_file` VALUES ('75', '3', 'image/jpeg', '13586', 'd814a77dc9c54b7e.jpg', 'data/files/store_2/goods_86/200908061001263175.jpg', '1249552886', '2', '26');
INSERT INTO `ecm_uploaded_file` VALUES ('76', '3', 'image/jpeg', '11068', '6ae3ade81393e9ac.jpg', 'data/files/store_2/goods_5/200908061003253339.jpg', '1249553005', '2', '27');
INSERT INTO `ecm_uploaded_file` VALUES ('77', '3', 'image/jpeg', '9507', '688b8de7d9bc833a.jpg', 'data/files/store_2/goods_18/200908061003382600.jpg', '1249553018', '2', '27');
INSERT INTO `ecm_uploaded_file` VALUES ('78', '3', 'image/jpeg', '12437', 'f7881551d7148623.jpg', 'data/files/store_2/goods_29/200908061003494534.jpg', '1249553029', '2', '27');
INSERT INTO `ecm_uploaded_file` VALUES ('79', '3', 'image/jpeg', '12528', 'f15ea9ecafbdaf73.jpg', 'data/files/store_2/goods_115/200908061005154170.jpg', '1249553115', '2', '28');
INSERT INTO `ecm_uploaded_file` VALUES ('80', '3', 'image/jpeg', '10964', 'fae2eea4ee2c75b6.jpg', 'data/files/store_2/goods_14/200908061006541461.jpg', '1249553214', '2', '28');
INSERT INTO `ecm_uploaded_file` VALUES ('81', '3', 'image/jpeg', '12046', 'b75c0a159f3c10b5.jpg', 'data/files/store_2/goods_26/200908061007068653.jpg', '1249553226', '2', '28');
INSERT INTO `ecm_uploaded_file` VALUES ('82', '3', 'image/jpeg', '13297', '23141e259bb47c34.jpg', 'data/files/store_2/goods_121/200908061008412008.jpg', '1249553321', '2', '29');
INSERT INTO `ecm_uploaded_file` VALUES ('83', '3', 'image/jpeg', '11197', '946a7039481ebbd5.jpg', 'data/files/store_2/goods_127/200908061008473587.jpg', '1249553327', '2', '29');

-- ----------------------------
-- Table structure for `ecm_user_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_user_coupon`;
CREATE TABLE `ecm_user_coupon` (
  `user_id` int(10) unsigned NOT NULL,
  `coupon_sn` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`,`coupon_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_user_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `ecm_user_priv`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_user_priv`;
CREATE TABLE `ecm_user_priv` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `privs` text NOT NULL,
  PRIMARY KEY (`user_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_user_priv
-- ----------------------------
INSERT INTO `ecm_user_priv` VALUES ('1', '0', 'all');
INSERT INTO `ecm_user_priv` VALUES ('3', '3', 'all');
INSERT INTO `ecm_user_priv` VALUES ('2', '2', 'all');
