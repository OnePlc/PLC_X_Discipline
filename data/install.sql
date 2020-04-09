--
-- Base Table
--
CREATE TABLE `discipline` (
  `Discipline_ID` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `discipline`
  ADD PRIMARY KEY (`Discipline_ID`);

ALTER TABLE `discipline`
  MODIFY `Discipline_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Permissions
--
INSERT INTO `permission` (`permission_key`, `module`, `label`, `nav_label`, `nav_href`, `show_in_menu`) VALUES
('add', 'OnePlace\\Discipline\\Controller\\DisciplineController', 'Add', '', '', 0),
('edit', 'OnePlace\\Discipline\\Controller\\DisciplineController', 'Edit', '', '', 0),
('index', 'OnePlace\\Discipline\\Controller\\DisciplineController', 'Index', 'Disciplines', '/discipline', 1),
('list', 'OnePlace\\Discipline\\Controller\\ApiController', 'List', '', '', 1),
('view', 'OnePlace\\Discipline\\Controller\\DisciplineController', 'View', '', '', 0),
('dump', 'OnePlace\\Discipline\\Controller\\ExportController', 'Excel Dump', '', '', 0),
('index', 'OnePlace\\Discipline\\Controller\\SearchController', 'Search', '', '', 0);

--
-- Form
--
INSERT INTO `core_form` (`form_key`, `label`, `entity_class`, `entity_tbl_class`) VALUES
('discipline-single', 'Discipline', 'OnePlace\\Discipline\\Model\\Discipline', 'OnePlace\\Discipline\\Model\\DisciplineTable');

--
-- Index List
--
INSERT INTO `core_index_table` (`table_name`, `form`, `label`) VALUES
('discipline-index', 'discipline-single', 'Discipline Index');

--
-- Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES ('discipline-base', 'discipline-single', 'Discipline', 'Base', 'fas fa-cogs', '', '0', '', '');

--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Save Discipline', 'fas fa-save', 'Save Discipline', '#', 'primary saveForm', '', 'discipline-single', 'link', '', ''),
(NULL, 'Edit Discipline', 'fas fa-edit', 'Edit Discipline', '/discipline/edit/##ID##', 'primary', '', 'discipline-view', 'link', '', ''),
(NULL, 'Add Discipline', 'fas fa-plus', 'Add Discipline', '/discipline/add', 'primary', '', 'discipline-index', 'link', '', ''),
(NULL, 'Export Disciplines', 'fas fa-file-excel', 'Export Disciplines', '/discipline/export', 'primary', '', 'discipline-index', 'link', '', ''),
(NULL, 'Find Disciplines', 'fas fa-searh', 'Find Disciplines', '/discipline/search', 'primary', '', 'discipline-index', 'link', '', ''),
(NULL, 'Export Disciplines', 'fas fa-file-excel', 'Export Disciplines', '#', 'primary initExcelDump', '', 'discipline-search', 'link', '', ''),
(NULL, 'New Search', 'fas fa-searh', 'New Search', '/discipline/search', 'primary', '', 'discipline-search', 'link', '', '');

--
-- Fields
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'text', 'Name', 'label', 'discipline-base', 'discipline-single', 'col-md-3', '/discipline/view/##ID##', '', 0, 1, 0, '', '', '');

--
-- User XP Activity
--
INSERT INTO `user_xp_activity` (`Activity_ID`, `xp_key`, `label`, `xp_base`) VALUES
(NULL, 'discipline-add', 'Add New Discipline', '50'),
(NULL, 'discipline-edit', 'Edit Discipline', '5'),
(NULL, 'discipline-export', 'Edit Discipline', '5');

COMMIT;