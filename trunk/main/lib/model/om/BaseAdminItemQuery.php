<?php


/**
 * Base class that represents a query for the 'admin_item' table.
 *
 * 
 *
 * @method     AdminItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdminItemQuery orderByAdminCategoryId($order = Criteria::ASC) Order by the admin_category_id column
 * @method     AdminItemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AdminItemQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     AdminItemQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     AdminItemQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     AdminItemQuery orderByIsEnabled($order = Criteria::ASC) Order by the is_enabled column
 *
 * @method     AdminItemQuery groupById() Group by the id column
 * @method     AdminItemQuery groupByAdminCategoryId() Group by the admin_category_id column
 * @method     AdminItemQuery groupByName() Group by the name column
 * @method     AdminItemQuery groupByUrl() Group by the url column
 * @method     AdminItemQuery groupByImage() Group by the image column
 * @method     AdminItemQuery groupByModule() Group by the module column
 * @method     AdminItemQuery groupByIsEnabled() Group by the is_enabled column
 *
 * @method     AdminItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdminItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdminItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdminItemQuery leftJoinAdminCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminCategory relation
 * @method     AdminItemQuery rightJoinAdminCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminCategory relation
 * @method     AdminItemQuery innerJoinAdminCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminCategory relation
 *
 * @method     AdminItem findOne(PropelPDO $con = null) Return the first AdminItem matching the query
 * @method     AdminItem findOneOrCreate(PropelPDO $con = null) Return the first AdminItem matching the query, or a new AdminItem object populated from the query conditions when no match is found
 *
 * @method     AdminItem findOneById(int $id) Return the first AdminItem filtered by the id column
 * @method     AdminItem findOneByAdminCategoryId(int $admin_category_id) Return the first AdminItem filtered by the admin_category_id column
 * @method     AdminItem findOneByName(string $name) Return the first AdminItem filtered by the name column
 * @method     AdminItem findOneByUrl(string $url) Return the first AdminItem filtered by the url column
 * @method     AdminItem findOneByImage(string $image) Return the first AdminItem filtered by the image column
 * @method     AdminItem findOneByModule(string $module) Return the first AdminItem filtered by the module column
 * @method     AdminItem findOneByIsEnabled(int $is_enabled) Return the first AdminItem filtered by the is_enabled column
 *
 * @method     array findById(int $id) Return AdminItem objects filtered by the id column
 * @method     array findByAdminCategoryId(int $admin_category_id) Return AdminItem objects filtered by the admin_category_id column
 * @method     array findByName(string $name) Return AdminItem objects filtered by the name column
 * @method     array findByUrl(string $url) Return AdminItem objects filtered by the url column
 * @method     array findByImage(string $image) Return AdminItem objects filtered by the image column
 * @method     array findByModule(string $module) Return AdminItem objects filtered by the module column
 * @method     array findByIsEnabled(int $is_enabled) Return AdminItem objects filtered by the is_enabled column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdminItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'AdminItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdminItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdminItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdminItemQuery) {
			return $criteria;
		}
		$query = new AdminItemQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AdminItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdminItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdminItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdminItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdminItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the admin_category_id column
	 * 
	 * @param     int|array $adminCategoryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByAdminCategoryId($adminCategoryId = null, $comparison = null)
	{
		if (is_array($adminCategoryId)) {
			$useMinMax = false;
			if (isset($adminCategoryId['min'])) {
				$this->addUsingAlias(AdminItemPeer::ADMIN_CATEGORY_ID, $adminCategoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($adminCategoryId['max'])) {
				$this->addUsingAlias(AdminItemPeer::ADMIN_CATEGORY_ID, $adminCategoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminItemPeer::ADMIN_CATEGORY_ID, $adminCategoryId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminItemPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminItemPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the image column
	 * 
	 * @param     string $image The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($image)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $image)) {
				$image = str_replace('*', '%', $image);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminItemPeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the module column
	 * 
	 * @param     string $module The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByModule($module = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($module)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $module)) {
				$module = str_replace('*', '%', $module);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminItemPeer::MODULE, $module, $comparison);
	}

	/**
	 * Filter the query on the is_enabled column
	 * 
	 * @param     int|array $isEnabled The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByIsEnabled($isEnabled = null, $comparison = null)
	{
		if (is_array($isEnabled)) {
			$useMinMax = false;
			if (isset($isEnabled['min'])) {
				$this->addUsingAlias(AdminItemPeer::IS_ENABLED, $isEnabled['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isEnabled['max'])) {
				$this->addUsingAlias(AdminItemPeer::IS_ENABLED, $isEnabled['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminItemPeer::IS_ENABLED, $isEnabled, $comparison);
	}

	/**
	 * Filter the query by a related AdminCategory object
	 *
	 * @param     AdminCategory $adminCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function filterByAdminCategory($adminCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminItemPeer::ADMIN_CATEGORY_ID, $adminCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function joinAdminCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdminCategory');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'AdminCategory');
		}
		
		return $this;
	}

	/**
	 * Use the AdminCategory relation AdminCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useAdminCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdminCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdminCategory', 'AdminCategoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdminItem $adminItem Object to remove from the list of results
	 *
	 * @return    AdminItemQuery The current query, for fluid interface
	 */
	public function prune($adminItem = null)
	{
		if ($adminItem) {
			$this->addUsingAlias(AdminItemPeer::ID, $adminItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdminItemQuery
