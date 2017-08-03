<?php


/**
 * Base class that represents a query for the 'slideshow' table.
 *
 * 
 *
 * @method     SlideshowQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SlideshowQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SlideshowQuery orderByImageWidth($order = Criteria::ASC) Order by the image_width column
 * @method     SlideshowQuery orderByImageHeight($order = Criteria::ASC) Order by the image_height column
 *
 * @method     SlideshowQuery groupById() Group by the id column
 * @method     SlideshowQuery groupByName() Group by the name column
 * @method     SlideshowQuery groupByImageWidth() Group by the image_width column
 * @method     SlideshowQuery groupByImageHeight() Group by the image_height column
 *
 * @method     SlideshowQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SlideshowQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SlideshowQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SlideshowQuery leftJoinSlideshowItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SlideshowItem relation
 * @method     SlideshowQuery rightJoinSlideshowItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SlideshowItem relation
 * @method     SlideshowQuery innerJoinSlideshowItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SlideshowItem relation
 *
 * @method     Slideshow findOne(PropelPDO $con = null) Return the first Slideshow matching the query
 * @method     Slideshow findOneOrCreate(PropelPDO $con = null) Return the first Slideshow matching the query, or a new Slideshow object populated from the query conditions when no match is found
 *
 * @method     Slideshow findOneById(int $id) Return the first Slideshow filtered by the id column
 * @method     Slideshow findOneByName(string $name) Return the first Slideshow filtered by the name column
 * @method     Slideshow findOneByImageWidth(int $image_width) Return the first Slideshow filtered by the image_width column
 * @method     Slideshow findOneByImageHeight(int $image_height) Return the first Slideshow filtered by the image_height column
 *
 * @method     array findById(int $id) Return Slideshow objects filtered by the id column
 * @method     array findByName(string $name) Return Slideshow objects filtered by the name column
 * @method     array findByImageWidth(int $image_width) Return Slideshow objects filtered by the image_width column
 * @method     array findByImageHeight(int $image_height) Return Slideshow objects filtered by the image_height column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSlideshowQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSlideshowQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Slideshow', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SlideshowQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SlideshowQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SlideshowQuery) {
			return $criteria;
		}
		$query = new SlideshowQuery();
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
	 * @return    Slideshow|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SlideshowPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SlideshowPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SlideshowPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SlideshowPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SlideshowPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the image_width column
	 * 
	 * @param     int|array $imageWidth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function filterByImageWidth($imageWidth = null, $comparison = null)
	{
		if (is_array($imageWidth)) {
			$useMinMax = false;
			if (isset($imageWidth['min'])) {
				$this->addUsingAlias(SlideshowPeer::IMAGE_WIDTH, $imageWidth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($imageWidth['max'])) {
				$this->addUsingAlias(SlideshowPeer::IMAGE_WIDTH, $imageWidth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SlideshowPeer::IMAGE_WIDTH, $imageWidth, $comparison);
	}

	/**
	 * Filter the query on the image_height column
	 * 
	 * @param     int|array $imageHeight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function filterByImageHeight($imageHeight = null, $comparison = null)
	{
		if (is_array($imageHeight)) {
			$useMinMax = false;
			if (isset($imageHeight['min'])) {
				$this->addUsingAlias(SlideshowPeer::IMAGE_HEIGHT, $imageHeight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($imageHeight['max'])) {
				$this->addUsingAlias(SlideshowPeer::IMAGE_HEIGHT, $imageHeight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SlideshowPeer::IMAGE_HEIGHT, $imageHeight, $comparison);
	}

	/**
	 * Filter the query by a related SlideshowItem object
	 *
	 * @param     SlideshowItem $slideshowItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function filterBySlideshowItem($slideshowItem, $comparison = null)
	{
		return $this
			->addUsingAlias(SlideshowPeer::ID, $slideshowItem->getSlideshowId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SlideshowItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function joinSlideshowItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SlideshowItem');
		
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
			$this->addJoinObject($join, 'SlideshowItem');
		}
		
		return $this;
	}

	/**
	 * Use the SlideshowItem relation SlideshowItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SlideshowItemQuery A secondary query class using the current class as primary query
	 */
	public function useSlideshowItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSlideshowItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SlideshowItem', 'SlideshowItemQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Slideshow $slideshow Object to remove from the list of results
	 *
	 * @return    SlideshowQuery The current query, for fluid interface
	 */
	public function prune($slideshow = null)
	{
		if ($slideshow) {
			$this->addUsingAlias(SlideshowPeer::ID, $slideshow->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSlideshowQuery
