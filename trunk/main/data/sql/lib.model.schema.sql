
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- archive
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `archive`;


CREATE TABLE `archive`
(
	`ar_namespace` INTEGER(11) default 0 NOT NULL,
	`ar_title` VARCHAR(255) default '' NOT NULL,
	`ar_text` LONGBLOB  NOT NULL,
	`ar_comment` BLOB  NOT NULL,
	`ar_user` INTEGER(10) default 0 NOT NULL,
	`ar_user_text` VARCHAR(255)  NOT NULL,
	`ar_timestamp` VARCHAR(14) default '' NOT NULL,
	`ar_minor_edit` TINYINT(4) default 0 NOT NULL,
	`ar_flags` BLOB  NOT NULL,
	`ar_rev_id` INTEGER(10),
	`ar_text_id` INTEGER(10),
	`ar_deleted` TINYINT(3) default 0 NOT NULL,
	`ar_len` INTEGER(10),
	`ar_page_id` INTEGER(10),
	`ar_parent_id` INTEGER(10),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `name_title_timestamp`(`ar_namespace`, `ar_title`, `ar_timestamp`),
	KEY `usertext_timestamp`(`ar_user_text`, `ar_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;


CREATE TABLE `category`
(
	`cat_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`cat_title` VARCHAR(255)  NOT NULL,
	`cat_pages` INTEGER(11) default 0 NOT NULL,
	`cat_subcats` INTEGER(11) default 0 NOT NULL,
	`cat_files` INTEGER(11) default 0 NOT NULL,
	`cat_hidden` TINYINT(3) default 0 NOT NULL,
	PRIMARY KEY (`cat_id`),
	UNIQUE KEY `cat_title` (`cat_title`),
	KEY `cat_pages`(`cat_pages`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- categorylinks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categorylinks`;


CREATE TABLE `categorylinks`
(
	`cl_from` INTEGER(10) default 0 NOT NULL,
	`cl_to` VARCHAR(255) default '' NOT NULL,
	`cl_sortkey` VARCHAR(70) default '' NOT NULL,
	`cl_timestamp` TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `cl_from` (`cl_from`, `cl_to`),
	KEY `cl_sortkey`(`cl_to`, `cl_sortkey`, `cl_from`),
	KEY `cl_timestamp`(`cl_to`, `cl_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- change_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `change_tag`;


CREATE TABLE `change_tag`
(
	`ct_rc_id` INTEGER(11),
	`ct_log_id` INTEGER(11),
	`ct_rev_id` INTEGER(11),
	`ct_tag` VARCHAR(255)  NOT NULL,
	`ct_params` LONGBLOB,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `change_tag_rc_tag` (`ct_rc_id`, `ct_tag`),
	UNIQUE KEY `change_tag_log_tag` (`ct_log_id`, `ct_tag`),
	UNIQUE KEY `change_tag_rev_tag` (`ct_rev_id`, `ct_tag`),
	KEY `change_tag_tag_id`(`ct_tag`, `ct_rc_id`, `ct_rev_id`, `ct_log_id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- config
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `config`;


CREATE TABLE `config`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`value` VARCHAR(255),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- external_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `external_user`;


CREATE TABLE `external_user`
(
	`eu_local_id` INTEGER(10)  NOT NULL,
	`eu_external_id` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`eu_local_id`),
	UNIQUE KEY `eu_external_id` (`eu_external_id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- externallinks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `externallinks`;


CREATE TABLE `externallinks`
(
	`el_from` INTEGER(10) default 0 NOT NULL,
	`el_to` LONGBLOB  NOT NULL,
	`el_index` LONGBLOB  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `el_from`(`el_from`, `el_to`),
	KEY `el_to`(`el_to`, `el_from`),
	KEY `el_index`(`el_index`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- filearchive
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `filearchive`;


CREATE TABLE `filearchive`
(
	`fa_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fa_name` VARCHAR(255) default '' NOT NULL,
	`fa_archive_name` VARCHAR(255) default '',
	`fa_storage_group` VARCHAR(16),
	`fa_storage_key` VARCHAR(64) default '',
	`fa_deleted_user` INTEGER(11),
	`fa_deleted_timestamp` VARCHAR(14) default '',
	`fa_deleted_reason` TEXT,
	`fa_size` INTEGER(10) default 0,
	`fa_width` INTEGER(11) default 0,
	`fa_height` INTEGER(11) default 0,
	`fa_metadata` LONGBLOB,
	`fa_bits` INTEGER(11) default 0,
	`fa_media_type` CHAR,
	`fa_major_mime` CHAR default 'unknown',
	`fa_minor_mime` VARCHAR(100) default 'unknown',
	`fa_description` BLOB,
	`fa_user` INTEGER(10) default 0,
	`fa_user_text` VARCHAR(255),
	`fa_timestamp` VARCHAR(14) default '',
	`fa_deleted` TINYINT(3) default 0 NOT NULL,
	PRIMARY KEY (`fa_id`),
	KEY `fa_name`(`fa_name`, `fa_timestamp`),
	KEY `fa_storage_group`(`fa_storage_group`, `fa_storage_key`),
	KEY `fa_deleted_timestamp`(`fa_deleted_timestamp`),
	KEY `fa_user_timestamp`(`fa_user_text`, `fa_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `group`;


CREATE TABLE `group`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`group_name` VARCHAR(16)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `group_name` (`group_name`),
	UNIQUE KEY `group_name_2` (`group_name`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- hitcounter
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `hitcounter`;


CREATE TABLE `hitcounter`
(
	`hc_id` INTEGER(10)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- image
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `image`;


CREATE TABLE `image`
(
	`img_name` VARCHAR(255) default '' NOT NULL,
	`img_size` INTEGER(10) default 0 NOT NULL,
	`img_width` INTEGER(11) default 0 NOT NULL,
	`img_height` INTEGER(11) default 0 NOT NULL,
	`img_metadata` LONGBLOB  NOT NULL,
	`img_bits` INTEGER(11) default 0 NOT NULL,
	`img_media_type` CHAR,
	`img_major_mime` CHAR default 'unknown' NOT NULL,
	`img_minor_mime` VARCHAR(100) default 'unknown' NOT NULL,
	`img_description` BLOB  NOT NULL,
	`img_user` INTEGER(10) default 0 NOT NULL,
	`img_user_text` VARCHAR(255)  NOT NULL,
	`img_timestamp` VARCHAR(14) default '' NOT NULL,
	`img_sha1` VARCHAR(32) default '' NOT NULL,
	PRIMARY KEY (`img_name`),
	KEY `img_usertext_timestamp`(`img_user_text`, `img_timestamp`),
	KEY `img_size`(`img_size`),
	KEY `img_timestamp`(`img_timestamp`),
	KEY `img_sha1`(`img_sha1`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- imagelinks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `imagelinks`;


CREATE TABLE `imagelinks`
(
	`il_from` INTEGER(10) default 0 NOT NULL,
	`il_to` VARCHAR(255) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `il_from` (`il_from`, `il_to`),
	UNIQUE KEY `il_to` (`il_to`, `il_from`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- interwiki
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `interwiki`;


CREATE TABLE `interwiki`
(
	`iw_prefix` VARCHAR(32)  NOT NULL,
	`iw_url` LONGBLOB  NOT NULL,
	`iw_local` TINYINT(1)  NOT NULL,
	`iw_trans` TINYINT(4) default 0 NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `iw_prefix` (`iw_prefix`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- ipblocks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ipblocks`;


CREATE TABLE `ipblocks`
(
	`ipb_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`ipb_address` BLOB  NOT NULL,
	`ipb_user` INTEGER(10) default 0 NOT NULL,
	`ipb_by` INTEGER(10) default 0 NOT NULL,
	`ipb_by_text` VARCHAR(255) default '' NOT NULL,
	`ipb_reason` BLOB  NOT NULL,
	`ipb_timestamp` VARCHAR(14) default '' NOT NULL,
	`ipb_auto` TINYINT(1) default 0 NOT NULL,
	`ipb_anon_only` TINYINT(1) default 0 NOT NULL,
	`ipb_create_account` TINYINT(1) default 1 NOT NULL,
	`ipb_enable_autoblock` TINYINT(1) default 1 NOT NULL,
	`ipb_expiry` VARCHAR(14) default '' NOT NULL,
	`ipb_range_start` BLOB  NOT NULL,
	`ipb_range_end` BLOB  NOT NULL,
	`ipb_deleted` TINYINT(1) default 0 NOT NULL,
	`ipb_block_email` TINYINT(1) default 0 NOT NULL,
	`ipb_allow_usertalk` TINYINT(1) default 0 NOT NULL,
	PRIMARY KEY (`ipb_id`),
	UNIQUE KEY `ipb_address` (`ipb_address`, `ipb_user`, `ipb_auto`, `ipb_anon_only`),
	KEY `ipb_user`(`ipb_user`),
	KEY `ipb_range`(`ipb_range_start`, `ipb_range_end`),
	KEY `ipb_timestamp`(`ipb_timestamp`),
	KEY `ipb_expiry`(`ipb_expiry`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- job
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `job`;


CREATE TABLE `job`
(
	`job_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`job_cmd` VARCHAR(60) default '' NOT NULL,
	`job_namespace` INTEGER(11)  NOT NULL,
	`job_title` VARCHAR(255)  NOT NULL,
	`job_params` LONGBLOB  NOT NULL,
	PRIMARY KEY (`job_id`),
	KEY `job_cmd`(`job_cmd`, `job_namespace`, `job_title`, `job_params`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- l10n_cache
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `l10n_cache`;


CREATE TABLE `l10n_cache`
(
	`lc_lang` VARCHAR(32)  NOT NULL,
	`lc_key` VARCHAR(255)  NOT NULL,
	`lc_value` LONGBLOB  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `lc_lang_key`(`lc_lang`, `lc_key`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- langlinks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `langlinks`;


CREATE TABLE `langlinks`
(
	`ll_from` INTEGER(10) default 0 NOT NULL,
	`ll_lang` VARCHAR(20) default '' NOT NULL,
	`ll_title` VARCHAR(255) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `ll_from` (`ll_from`, `ll_lang`),
	KEY `ll_lang`(`ll_lang`, `ll_title`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- log_search
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `log_search`;


CREATE TABLE `log_search`
(
	`ls_field` VARCHAR(32)  NOT NULL,
	`ls_value` VARCHAR(255)  NOT NULL,
	`ls_log_id` INTEGER(10) default 0 NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `ls_field_val` (`ls_field`, `ls_value`, `ls_log_id`),
	KEY `ls_log_id`(`ls_log_id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- logging
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `logging`;


CREATE TABLE `logging`
(
	`log_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`log_type` VARCHAR(32) default '' NOT NULL,
	`log_action` VARCHAR(32) default '' NOT NULL,
	`log_timestamp` VARCHAR(14) default '19700101000000' NOT NULL,
	`log_user` INTEGER(10) default 0 NOT NULL,
	`log_user_text` VARCHAR(255) default '' NOT NULL,
	`log_namespace` INTEGER(11) default 0 NOT NULL,
	`log_title` VARCHAR(255) default '' NOT NULL,
	`log_page` INTEGER(10),
	`log_comment` VARCHAR(255) default '' NOT NULL,
	`log_params` LONGBLOB  NOT NULL,
	`log_deleted` TINYINT(3) default 0 NOT NULL,
	PRIMARY KEY (`log_id`),
	KEY `type_time`(`log_type`, `log_timestamp`),
	KEY `user_time`(`log_user`, `log_timestamp`),
	KEY `page_time`(`log_namespace`, `log_title`, `log_timestamp`),
	KEY `times`(`log_timestamp`),
	KEY `log_user_type_time`(`log_user`, `log_type`, `log_timestamp`),
	KEY `log_page_id_time`(`log_page`, `log_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- math
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `math`;


CREATE TABLE `math`
(
	`math_inputhash` VARCHAR(16)  NOT NULL,
	`math_outputhash` VARCHAR(16)  NOT NULL,
	`math_html_conservativeness` TINYINT(4)  NOT NULL,
	`math_html` TEXT,
	`math_mathml` TEXT,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `math_inputhash` (`math_inputhash`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- node
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `node`;


CREATE TABLE `node`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`parent_id` INTEGER(11),
	`name` VARCHAR(255),
	`type` TINYINT(4),
	PRIMARY KEY (`id`),
	KEY `parent_id`(`parent_id`),
	CONSTRAINT `node_FK_1`
		FOREIGN KEY (`parent_id`)
		REFERENCES `node` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- node_group_access
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `node_group_access`;


CREATE TABLE `node_group_access`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`node_id` INTEGER(11),
	`group_id` INTEGER(11),
	PRIMARY KEY (`id`),
	KEY `node_id`(`node_id`),
	KEY `group_id`(`group_id`),
	CONSTRAINT `node_group_access_FK_1`
		FOREIGN KEY (`node_id`)
		REFERENCES `node` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `node_group_access_FK_2`
		FOREIGN KEY (`group_id`)
		REFERENCES `group` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- objectcache
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `objectcache`;


CREATE TABLE `objectcache`
(
	`keyname` VARCHAR(255) default '' NOT NULL,
	`value` LONGBLOB,
	`exptime` DATETIME,
	PRIMARY KEY (`keyname`),
	KEY `exptime`(`exptime`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- oldimage
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `oldimage`;


CREATE TABLE `oldimage`
(
	`oi_name` VARCHAR(255) default '' NOT NULL,
	`oi_archive_name` VARCHAR(255) default '' NOT NULL,
	`oi_size` INTEGER(10) default 0 NOT NULL,
	`oi_width` INTEGER(11) default 0 NOT NULL,
	`oi_height` INTEGER(11) default 0 NOT NULL,
	`oi_bits` INTEGER(11) default 0 NOT NULL,
	`oi_description` BLOB  NOT NULL,
	`oi_user` INTEGER(10) default 0 NOT NULL,
	`oi_user_text` VARCHAR(255)  NOT NULL,
	`oi_timestamp` VARCHAR(14) default '' NOT NULL,
	`oi_metadata` LONGBLOB  NOT NULL,
	`oi_media_type` CHAR,
	`oi_major_mime` CHAR default 'unknown' NOT NULL,
	`oi_minor_mime` VARCHAR(100) default 'unknown' NOT NULL,
	`oi_deleted` TINYINT(3) default 0 NOT NULL,
	`oi_sha1` VARCHAR(32) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `oi_usertext_timestamp`(`oi_user_text`, `oi_timestamp`),
	KEY `oi_name_timestamp`(`oi_name`, `oi_timestamp`),
	KEY `oi_name_archive_name`(`oi_name`, `oi_archive_name`),
	KEY `oi_sha1`(`oi_sha1`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- page
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `page`;


CREATE TABLE `page`
(
	`page_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`page_namespace` INTEGER(11)  NOT NULL,
	`page_title` VARCHAR(255)  NOT NULL,
	`page_restrictions` BLOB  NOT NULL,
	`page_counter` BIGINT(20) default 0 NOT NULL,
	`page_is_redirect` TINYINT(3) default 0 NOT NULL,
	`page_is_new` TINYINT(3) default 0 NOT NULL,
	`page_random` DOUBLE  NOT NULL,
	`page_touched` VARCHAR(14) default '' NOT NULL,
	`page_latest` INTEGER(10)  NOT NULL,
	`page_len` INTEGER(10)  NOT NULL,
	PRIMARY KEY (`page_id`),
	UNIQUE KEY `name_title` (`page_namespace`, `page_title`),
	KEY `page_random`(`page_random`),
	KEY `page_len`(`page_len`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- page_props
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `page_props`;


CREATE TABLE `page_props`
(
	`pp_page` INTEGER(11)  NOT NULL,
	`pp_propname` VARCHAR(60)  NOT NULL,
	`pp_value` LONGBLOB  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `pp_page_propname` (`pp_page`, `pp_propname`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- page_restrictions
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `page_restrictions`;


CREATE TABLE `page_restrictions`
(
	`pr_page` INTEGER(11)  NOT NULL,
	`pr_type` VARCHAR(60)  NOT NULL,
	`pr_level` VARCHAR(60)  NOT NULL,
	`pr_cascade` TINYINT(4)  NOT NULL,
	`pr_user` INTEGER(11),
	`pr_expiry` VARCHAR(14),
	`pr_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`pr_id`),
	UNIQUE KEY `pr_pagetype` (`pr_page`, `pr_type`),
	KEY `pr_typelevel`(`pr_type`, `pr_level`),
	KEY `pr_level`(`pr_level`),
	KEY `pr_cascade`(`pr_cascade`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- pagelinks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pagelinks`;


CREATE TABLE `pagelinks`
(
	`pl_from` INTEGER(10) default 0 NOT NULL,
	`pl_namespace` INTEGER(11) default 0 NOT NULL,
	`pl_title` VARCHAR(255) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `pl_from` (`pl_from`, `pl_namespace`, `pl_title`),
	UNIQUE KEY `pl_namespace` (`pl_namespace`, `pl_title`, `pl_from`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- protected_titles
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `protected_titles`;


CREATE TABLE `protected_titles`
(
	`pt_namespace` INTEGER(11)  NOT NULL,
	`pt_title` VARCHAR(255)  NOT NULL,
	`pt_user` INTEGER(10)  NOT NULL,
	`pt_reason` BLOB,
	`pt_timestamp` VARCHAR(14)  NOT NULL,
	`pt_expiry` VARCHAR(14) default '' NOT NULL,
	`pt_create_perm` VARCHAR(60)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `pt_namespace_title` (`pt_namespace`, `pt_title`),
	KEY `pt_timestamp`(`pt_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- querycache
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `querycache`;


CREATE TABLE `querycache`
(
	`qc_type` VARCHAR(32)  NOT NULL,
	`qc_value` INTEGER(10) default 0 NOT NULL,
	`qc_namespace` INTEGER(11) default 0 NOT NULL,
	`qc_title` VARCHAR(255) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `qc_type`(`qc_type`, `qc_value`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- querycache_info
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `querycache_info`;


CREATE TABLE `querycache_info`
(
	`qci_type` VARCHAR(32) default '' NOT NULL,
	`qci_timestamp` VARCHAR(14) default '19700101000000' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `qci_type` (`qci_type`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- querycachetwo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `querycachetwo`;


CREATE TABLE `querycachetwo`
(
	`qcc_type` VARCHAR(32)  NOT NULL,
	`qcc_value` INTEGER(10) default 0 NOT NULL,
	`qcc_namespace` INTEGER(11) default 0 NOT NULL,
	`qcc_title` VARCHAR(255) default '' NOT NULL,
	`qcc_namespacetwo` INTEGER(11) default 0 NOT NULL,
	`qcc_titletwo` VARCHAR(255) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `qcc_type`(`qcc_type`, `qcc_value`),
	KEY `qcc_title`(`qcc_type`, `qcc_namespace`, `qcc_title`),
	KEY `qcc_titletwo`(`qcc_type`, `qcc_namespacetwo`, `qcc_titletwo`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- recentchanges
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `recentchanges`;


CREATE TABLE `recentchanges`
(
	`rc_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`rc_timestamp` VARCHAR(14) default '' NOT NULL,
	`rc_cur_time` VARCHAR(14) default '' NOT NULL,
	`rc_user` INTEGER(10) default 0 NOT NULL,
	`rc_user_text` VARCHAR(255)  NOT NULL,
	`rc_namespace` INTEGER(11) default 0 NOT NULL,
	`rc_title` VARCHAR(255) default '' NOT NULL,
	`rc_comment` VARCHAR(255) default '' NOT NULL,
	`rc_minor` TINYINT(3) default 0 NOT NULL,
	`rc_bot` TINYINT(3) default 0 NOT NULL,
	`rc_new` TINYINT(3) default 0 NOT NULL,
	`rc_cur_id` INTEGER(10) default 0 NOT NULL,
	`rc_this_oldid` INTEGER(10) default 0 NOT NULL,
	`rc_last_oldid` INTEGER(10) default 0 NOT NULL,
	`rc_type` TINYINT(3) default 0 NOT NULL,
	`rc_moved_to_ns` TINYINT(3) default 0 NOT NULL,
	`rc_moved_to_title` VARCHAR(255) default '' NOT NULL,
	`rc_patrolled` TINYINT(3) default 0 NOT NULL,
	`rc_ip` VARCHAR(40) default '' NOT NULL,
	`rc_old_len` INTEGER(11),
	`rc_new_len` INTEGER(11),
	`rc_deleted` TINYINT(3) default 0 NOT NULL,
	`rc_logid` INTEGER(10) default 0 NOT NULL,
	`rc_log_type` VARCHAR(255),
	`rc_log_action` VARCHAR(255),
	`rc_params` LONGBLOB,
	PRIMARY KEY (`rc_id`),
	KEY `rc_timestamp`(`rc_timestamp`),
	KEY `rc_namespace_title`(`rc_namespace`, `rc_title`),
	KEY `rc_cur_id`(`rc_cur_id`),
	KEY `new_name_timestamp`(`rc_new`, `rc_namespace`, `rc_timestamp`),
	KEY `rc_ip`(`rc_ip`),
	KEY `rc_ns_usertext`(`rc_namespace`, `rc_user_text`),
	KEY `rc_user_text`(`rc_user_text`, `rc_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- redirect
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `redirect`;


CREATE TABLE `redirect`
(
	`rd_from` INTEGER(10) default 0 NOT NULL,
	`rd_namespace` INTEGER(11) default 0 NOT NULL,
	`rd_title` VARCHAR(255) default '' NOT NULL,
	`rd_interwiki` VARCHAR(32),
	`rd_fragment` VARCHAR(255),
	PRIMARY KEY (`rd_from`),
	KEY `rd_ns_title`(`rd_namespace`, `rd_title`, `rd_from`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- revision
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `revision`;


CREATE TABLE `revision`
(
	`rev_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`rev_page` INTEGER(10)  NOT NULL,
	`rev_text_id` INTEGER(10)  NOT NULL,
	`rev_comment` BLOB  NOT NULL,
	`rev_user` INTEGER(10) default 0 NOT NULL,
	`rev_user_text` VARCHAR(255) default '' NOT NULL,
	`rev_timestamp` VARCHAR(14) default '' NOT NULL,
	`rev_minor_edit` TINYINT(3) default 0 NOT NULL,
	`rev_deleted` TINYINT(3) default 0 NOT NULL,
	`rev_len` INTEGER(10),
	`rev_parent_id` INTEGER(10),
	PRIMARY KEY (`rev_id`),
	UNIQUE KEY `rev_page_id` (`rev_page`, `rev_id`),
	KEY `rev_timestamp`(`rev_timestamp`),
	KEY `page_timestamp`(`rev_page`, `rev_timestamp`),
	KEY `user_timestamp`(`rev_user`, `rev_timestamp`),
	KEY `usertext_timestamp`(`rev_user_text`, `rev_timestamp`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- searchindex
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `searchindex`;


CREATE TABLE `searchindex`
(
	`si_page` INTEGER(10)  NOT NULL,
	`si_title` VARCHAR(255) default '' NOT NULL,
	`si_text` TEXT  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `si_page` (`si_page`),
	KEY `si_title`(`si_title`),
	KEY `si_text`(`si_text`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- site_stats
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `site_stats`;


CREATE TABLE `site_stats`
(
	`ss_row_id` INTEGER(10)  NOT NULL,
	`ss_total_views` BIGINT(20) default 0,
	`ss_total_edits` BIGINT(20) default 0,
	`ss_good_articles` BIGINT(20) default 0,
	`ss_total_pages` BIGINT(20) default -1,
	`ss_users` BIGINT(20) default -1,
	`ss_active_users` BIGINT(20) default -1,
	`ss_admins` INTEGER(11) default -1,
	`ss_images` INTEGER(11) default 0,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `ss_row_id` (`ss_row_id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- stat_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `stat_log`;


CREATE TABLE `stat_log`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(100)  NOT NULL,
	`page` VARCHAR(100)  NOT NULL,
	`visit_time` TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- tag_summary
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tag_summary`;


CREATE TABLE `tag_summary`
(
	`ts_rc_id` INTEGER(11),
	`ts_log_id` INTEGER(11),
	`ts_rev_id` INTEGER(11),
	`ts_tags` LONGBLOB  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tag_summary_rc_id` (`ts_rc_id`),
	UNIQUE KEY `tag_summary_log_id` (`ts_log_id`),
	UNIQUE KEY `tag_summary_rev_id` (`ts_rev_id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- templatelinks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `templatelinks`;


CREATE TABLE `templatelinks`
(
	`tl_from` INTEGER(10) default 0 NOT NULL,
	`tl_namespace` INTEGER(11) default 0 NOT NULL,
	`tl_title` VARCHAR(255) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tl_from` (`tl_from`, `tl_namespace`, `tl_title`),
	UNIQUE KEY `tl_namespace` (`tl_namespace`, `tl_title`, `tl_from`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- text
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `text`;


CREATE TABLE `text`
(
	`old_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`old_text` LONGBLOB  NOT NULL,
	`old_flags` BLOB  NOT NULL,
	PRIMARY KEY (`old_id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- trackbacks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `trackbacks`;


CREATE TABLE `trackbacks`
(
	`tb_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`tb_page` INTEGER(11),
	`tb_title` VARCHAR(255)  NOT NULL,
	`tb_url` LONGBLOB  NOT NULL,
	`tb_ex` TEXT,
	`tb_name` VARCHAR(255),
	PRIMARY KEY (`tb_id`),
	KEY `tb_page`(`tb_page`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- transcache
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `transcache`;


CREATE TABLE `transcache`
(
	`tc_url` VARCHAR(255)  NOT NULL,
	`tc_contents` TEXT,
	`tc_time` VARCHAR(14)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tc_url_idx` (`tc_url`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- updatelog
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `updatelog`;


CREATE TABLE `updatelog`
(
	`ul_key` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`ul_key`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`user_id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(255) default '' NOT NULL,
	`user_real_name` VARCHAR(255) default '' NOT NULL,
	`user_password` BLOB  NOT NULL,
	`user_newpassword` BLOB  NOT NULL,
	`user_newpass_time` VARCHAR(14),
	`user_email` VARCHAR(255)  NOT NULL,
	`user_options` LONGBLOB  NOT NULL,
	`user_touched` VARCHAR(14) default '' NOT NULL,
	`user_token` VARCHAR(32) default '' NOT NULL,
	`user_email_authenticated` VARCHAR(14),
	`user_email_token` VARCHAR(32),
	`user_email_token_expires` VARCHAR(14),
	`user_registration` VARCHAR(14),
	`user_editcount` INTEGER(11),
	PRIMARY KEY (`user_id`),
	UNIQUE KEY `user_name` (`user_name`),
	KEY `user_I_1`(`user_email_token`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- user_groups
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;


CREATE TABLE `user_groups`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`ug_user` INTEGER(10) default 0 NOT NULL,
	`ug_group` VARCHAR(16) default '' NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `ug_user_group` (`ug_user`, `ug_group`),
	KEY `ug_group`(`ug_group`),
	KEY `ug_user`(`ug_user`),
	CONSTRAINT `user_groups_FK_1`
		FOREIGN KEY (`ug_user`)
		REFERENCES `user` (`user_id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `user_groups_FK_2`
		FOREIGN KEY (`ug_group`)
		REFERENCES `group` (`group_name`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- user_newtalk
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_newtalk`;


CREATE TABLE `user_newtalk`
(
	`user_id` INTEGER(11) default 0 NOT NULL,
	`user_ip` VARCHAR(40) default '' NOT NULL,
	`user_last_timestamp` VARCHAR(14) default '' NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `user_id`(`user_id`),
	KEY `user_ip`(`user_ip`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- user_properties
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_properties`;


CREATE TABLE `user_properties`
(
	`up_user` INTEGER(11)  NOT NULL,
	`up_property` VARCHAR(32)  NOT NULL,
	`up_value` LONGBLOB,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `user_properties_user_property` (`up_user`, `up_property`),
	KEY `user_properties_property`(`up_property`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- valid_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `valid_tag`;


CREATE TABLE `valid_tag`
(
	`vt_tag` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`vt_tag`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- watchlist
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watchlist`;


CREATE TABLE `watchlist`
(
	`wl_user` INTEGER(10)  NOT NULL,
	`wl_namespace` INTEGER(11) default 0 NOT NULL,
	`wl_title` VARCHAR(255) default '' NOT NULL,
	`wl_notificationtimestamp` VARCHAR(14),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `wl_user` (`wl_user`, `wl_namespace`, `wl_title`),
	KEY `namespace_title`(`wl_namespace`, `wl_title`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
