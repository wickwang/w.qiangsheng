<?php



/**
 * This class defines the structure of the 'trans_unit' table.
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
class TransUnitTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TransUnitTableMap';

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
		$this->setName('trans_unit');
		$this->setPhpName('TransUnit');
		$this->setClassname('TransUnit');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('MSG_ID', 'MsgId', 'INTEGER', true, 11, null);
		$this->addColumn('CAT_ID', 'CatId', 'INTEGER', true, 11, 1);
		$this->addColumn('ID', 'Id', 'VARCHAR', true, 255, '');
		$this->addColumn('SOURCE', 'Source', 'LONGVARCHAR', true, null, null);
		$this->addColumn('TARGET', 'Target', 'LONGVARCHAR', true, null, null);
		$this->addColumn('COMMENTS', 'Comments', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATE_ADDED', 'DateAdded', 'INTEGER', true, 11, 0);
		$this->addColumn('DATE_MODIFIED', 'DateModified', 'INTEGER', true, 11, 0);
		$this->addColumn('AUTHOR', 'Author', 'VARCHAR', false, 255, '');
		$this->addColumn('TRANSLATED', 'Translated', 'TINYINT', true, 1, 1);
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

} // TransUnitTableMap
