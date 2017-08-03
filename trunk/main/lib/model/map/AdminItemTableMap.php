<?php



/**
 * This class defines the structure of the 'admin_item' table.
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
class AdminItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AdminItemTableMap';

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
		$this->setName('admin_item');
		$this->setPhpName('AdminItem');
		$this->setClassname('AdminItem');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('ADMIN_CATEGORY_ID', 'AdminCategoryId', 'INTEGER', 'admin_category', 'ID', false, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 1000, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', false, 1000, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 1000, null);
		$this->addColumn('MODULE', 'Module', 'VARCHAR', false, 500, null);
		$this->addColumn('IS_ENABLED', 'IsEnabled', 'TINYINT', false, 1, 1);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AdminCategory', 'AdminCategory', RelationMap::MANY_TO_ONE, array('admin_category_id' => 'id', ), 'SET NULL', 'SET NULL');
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

} // AdminItemTableMap
