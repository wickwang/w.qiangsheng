<?php



/**
 * This class defines the structure of the 'catalogue' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class CatalogueTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CatalogueTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('catalogue');
		$this->setPhpName('Catalogue');
		$this->setClassname('Catalogue');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('CAT_ID', 'CatId', 'INTEGER', true, 11, null);
		$this->addColumn('TYPE_ID', 'TypeId', 'TINYINT', false, 4, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, '');
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255, null);
		$this->addColumn('SOURCE_LANG', 'SourceLang', 'VARCHAR', true, 100, '');
		$this->addColumn('TARGET_LANG', 'TargetLang', 'VARCHAR', true, 100, '');
		$this->addColumn('DATE_CREATED', 'DateCreated', 'INTEGER', true, 11, 0);
		$this->addColumn('DATE_MODIFIED', 'DateModified', 'INTEGER', true, 11, 0);
		$this->addColumn('AUTHOR', 'Author', 'VARCHAR', true, 255, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // CatalogueTableMap
