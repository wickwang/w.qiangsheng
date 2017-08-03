<?php


/**
 * Base class that represents a query for the 'log_event' table.
 *
 * 
 *
 * @method     LogEventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LogEventQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     LogEventQuery orderBySource1($order = Criteria::ASC) Order by the source1 column
 * @method     LogEventQuery orderBySource2($order = Criteria::ASC) Order by the source2 column
 * @method     LogEventQuery orderByAction($order = Criteria::ASC) Order by the action column
 *
 * @method     LogEventQuery groupById() Group by the id column
 * @method     LogEventQuery groupByCategory() Group by the category column
 * @method     LogEventQuery groupBySource1() Group by the source1 column
 * @method     LogEventQuery groupBySource2() Group by the source2 column
 * @method     LogEventQuery groupByAction() Group by the action column
 *
 * @method     LogEventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LogEventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LogEventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LogEventQuery leftJoinLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Log relation
 * @method     LogEventQuery rightJoinLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Log relation
 * @method     LogEventQuery innerJoinLog($relationAlias = null) Adds a INNER JOIN clause to the query using the Log relation
 *
 * @method     LogEvent findOne(PropelPDO $con = null) Return the first LogEvent matching the query
 * @method     LogEvent findOneOrCreate(PropelPDO $con = null) Return the first LogEvent matching the query, or a new LogEvent object populated from the query conditions when no match is found
 *
 * @method     LogEvent findOneById(int $id) Return the first LogEvent filtered by the id column
 * @method     LogEvent findOneByCategory(int $category) Return the first LogEvent filtered by the category column
 * @method     LogEvent findOneBySource1(string $source1) Return the first LogEvent filtered by the source1 column
 * @method     LogEvent findOneBySource2(string $source2) Return the first LogEvent filtered by the source2 column
 * @method     LogEvent findOneByAction(string $action) Return the first LogEvent filtered by the action column
 *
 * @method     array findById(int $id) Return LogEvent objects filtered by the id column
 * @method     array findByCategory(int $category) Return LogEvent objects filtered by the category column
 * @method     array findBySource1(string $source1) Return LogEvent objects filtered by the source1 column
 * @method     array findBySource2(string $source2) Return LogEvent objects filtered by the source2 column
 * @method     array findByAction(string $action) Return LogEvent objects filtered by the action column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLogEventQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLogEventQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'LogEvent', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LogEventQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LogEventQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LogEventQuery) {
			return $criteria;
		}
		$query = new LogEventQuery();
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
	 * @return    LogEvent|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = LogEventPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LogEventPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LogEventPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LogEventPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the category column
	 * 
	 * @param     int|array $category The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterByCategory($category = null, $comparison = null)
	{
		if (is_array($category)) {
			$useMinMax = false;
			if (isset($category['min'])) {
				$this->addUsingAlias(LogEventPeer::CATEGORY, $category['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($category['max'])) {
				$this->addUsingAlias(LogEventPeer::CATEGORY, $category['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LogEventPeer::CATEGORY, $category, $comparison);
	}

	/**
	 * Filter the query on the source1 column
	 * 
	 * @param     string $source1 The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterBySource1($source1 = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($source1)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $source1)) {
				$source1 = str_replace('*', '%', $source1);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogEventPeer::SOURCE1, $source1, $comparison);
	}

	/**
	 * Filter the query on the source2 column
	 * 
	 * @param     string $source2 The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterBySource2($source2 = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($source2)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $source2)) {
				$source2 = str_replace('*', '%', $source2);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogEventPeer::SOURCE2, $source2, $comparison);
	}

	/**
	 * Filter the query on the action column
	 * 
	 * @param     string $action The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterByAction($action = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($action)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $action)) {
				$action = str_replace('*', '%', $action);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogEventPeer::ACTION, $action, $comparison);
	}

	/**
	 * Filter the query by a related Log object
	 *
	 * @param     Log $log  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function filterByLog($log, $comparison = null)
	{
		return $this
			->addUsingAlias(LogEventPeer::ID, $log->getLogEventId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Log relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function joinLog($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Log');
		
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
			$this->addJoinObject($join, 'Log');
		}
		
		return $this;
	}

	/**
	 * Use the Log relation Log object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LogQuery A secondary query class using the current class as primary query
	 */
	public function useLogQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLog($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Log', 'LogQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     LogEvent $logEvent Object to remove from the list of results
	 *
	 * @return    LogEventQuery The current query, for fluid interface
	 */
	public function prune($logEvent = null)
	{
		if ($logEvent) {
			$this->addUsingAlias(LogEventPeer::ID, $logEvent->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseLogEventQuery
