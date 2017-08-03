<?php


/**
 * Base class that represents a query for the 'text_box' table.
 *
 * 
 *
 * @method     TextBoxQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TextBoxQuery orderByBoxTypeId($order = Criteria::ASC) Order by the box_type_id column
 * @method     TextBoxQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     TextBoxQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     TextBoxQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     TextBoxQuery groupById() Group by the id column
 * @method     TextBoxQuery groupByBoxTypeId() Group by the box_type_id column
 * @method     TextBoxQuery groupByTitle() Group by the title column
 * @method     TextBoxQuery groupByBody() Group by the body column
 * @method     TextBoxQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     TextBoxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TextBoxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TextBoxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TextBoxQuery leftJoinBoxType($relationAlias = null) Adds a LEFT JOIN clause to the query using the BoxType relation
 * @method     TextBoxQuery rightJoinBoxType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BoxType relation
 * @method     TextBoxQuery innerJoinBoxType($relationAlias = null) Adds a INNER JOIN clause to the query using the BoxType relation
 *
 * @method     TextBox findOne(PropelPDO $con = null) Return the first TextBox matching the query
 * @method     TextBox findOneOrCreate(PropelPDO $con = null) Return the first TextBox matching the query, or a new TextBox object populated from the query conditions when no match is found
 *
 * @method     TextBox findOneById(int $id) Return the first TextBox filtered by the id column
 * @method     TextBox findOneByBoxTypeId(int $box_type_id) Return the first TextBox filtered by the box_type_id column
 * @method     TextBox findOneByTitle(string $title) Return the first TextBox filtered by the title column
 * @method     TextBox findOneByBody(string $body) Return the first TextBox filtered by the body column
 * @method     TextBox findOneByCreatedAt(int $created_at) Return the first TextBox filtered by the created_at column
 *
 * @method     array findById(int $id) Return TextBox objects filtered by the id column
 * @method     array findByBoxTypeId(int $box_type_id) Return TextBox objects filtered by the box_type_id column
 * @method     array findByTitle(string $title) Return TextBox objects filtered by the title column
 * @method     array findByBody(string $body) Return TextBox objects filtered by the body column
 * @method     array findByCreatedAt(int $created_at) Return TextBox objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTextBoxQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTextBoxQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TextBox', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TextBoxQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TextBoxQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TextBoxQuery) {
			return $criteria;
		}
		$query = new TextBoxQuery();
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
	 * @return    TextBox|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TextBoxPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TextBoxPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TextBoxPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TextBoxPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the box_type_id column
	 * 
	 * @param     int|array $boxTypeId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByBoxTypeId($boxTypeId = null, $comparison = null)
	{
		if (is_array($boxTypeId)) {
			$useMinMax = false;
			if (isset($boxTypeId['min'])) {
				$this->addUsingAlias(TextBoxPeer::BOX_TYPE_ID, $boxTypeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($boxTypeId['max'])) {
				$this->addUsingAlias(TextBoxPeer::BOX_TYPE_ID, $boxTypeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TextBoxPeer::BOX_TYPE_ID, $boxTypeId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TextBoxPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByBody($body = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($body)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $body)) {
				$body = str_replace('*', '%', $body);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TextBoxPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(TextBoxPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(TextBoxPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TextBoxPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related BoxType object
	 *
	 * @param     BoxType $boxType  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function filterByBoxType($boxType, $comparison = null)
	{
		return $this
			->addUsingAlias(TextBoxPeer::BOX_TYPE_ID, $boxType->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BoxType relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function joinBoxType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('BoxType');
		
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
			$this->addJoinObject($join, 'BoxType');
		}
		
		return $this;
	}

	/**
	 * Use the BoxType relation BoxType object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BoxTypeQuery A secondary query class using the current class as primary query
	 */
	public function useBoxTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBoxType($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BoxType', 'BoxTypeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TextBox $textBox Object to remove from the list of results
	 *
	 * @return    TextBoxQuery The current query, for fluid interface
	 */
	public function prune($textBox = null)
	{
		if ($textBox) {
			$this->addUsingAlias(TextBoxPeer::ID, $textBox->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTextBoxQuery
