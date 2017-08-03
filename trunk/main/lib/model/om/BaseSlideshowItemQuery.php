<?php


/**
 * Base class that represents a query for the 'slideshow_item' table.
 *
 * 
 *
 * @method     SlideshowItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SlideshowItemQuery orderBySlideshowId($order = Criteria::ASC) Order by the slideshow_id column
 * @method     SlideshowItemQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     SlideshowItemQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     SlideshowItemQuery orderByPhoto($order = Criteria::ASC) Order by the photo column
 * @method     SlideshowItemQuery orderByImageToken($order = Criteria::ASC) Order by the image_token column
 * @method     SlideshowItemQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     SlideshowItemQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     SlideshowItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SlideshowItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     SlideshowItemQuery groupById() Group by the id column
 * @method     SlideshowItemQuery groupBySlideshowId() Group by the slideshow_id column
 * @method     SlideshowItemQuery groupByTitle() Group by the title column
 * @method     SlideshowItemQuery groupByUrl() Group by the url column
 * @method     SlideshowItemQuery groupByPhoto() Group by the photo column
 * @method     SlideshowItemQuery groupByImageToken() Group by the image_token column
 * @method     SlideshowItemQuery groupByDescription() Group by the description column
 * @method     SlideshowItemQuery groupByPosition() Group by the position column
 * @method     SlideshowItemQuery groupByCreatedAt() Group by the created_at column
 * @method     SlideshowItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     SlideshowItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SlideshowItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SlideshowItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SlideshowItemQuery leftJoinSlideshow($relationAlias = null) Adds a LEFT JOIN clause to the query using the Slideshow relation
 * @method     SlideshowItemQuery rightJoinSlideshow($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Slideshow relation
 * @method     SlideshowItemQuery innerJoinSlideshow($relationAlias = null) Adds a INNER JOIN clause to the query using the Slideshow relation
 *
 * @method     SlideshowItem findOne(PropelPDO $con = null) Return the first SlideshowItem matching the query
 * @method     SlideshowItem findOneOrCreate(PropelPDO $con = null) Return the first SlideshowItem matching the query, or a new SlideshowItem object populated from the query conditions when no match is found
 *
 * @method     SlideshowItem findOneById(int $id) Return the first SlideshowItem filtered by the id column
 * @method     SlideshowItem findOneBySlideshowId(int $slideshow_id) Return the first SlideshowItem filtered by the slideshow_id column
 * @method     SlideshowItem findOneByTitle(string $title) Return the first SlideshowItem filtered by the title column
 * @method     SlideshowItem findOneByUrl(string $url) Return the first SlideshowItem filtered by the url column
 * @method     SlideshowItem findOneByPhoto(string $photo) Return the first SlideshowItem filtered by the photo column
 * @method     SlideshowItem findOneByImageToken(string $image_token) Return the first SlideshowItem filtered by the image_token column
 * @method     SlideshowItem findOneByDescription(string $description) Return the first SlideshowItem filtered by the description column
 * @method     SlideshowItem findOneByPosition(int $position) Return the first SlideshowItem filtered by the position column
 * @method     SlideshowItem findOneByCreatedAt(int $created_at) Return the first SlideshowItem filtered by the created_at column
 * @method     SlideshowItem findOneByUpdatedAt(int $updated_at) Return the first SlideshowItem filtered by the updated_at column
 *
 * @method     array findById(int $id) Return SlideshowItem objects filtered by the id column
 * @method     array findBySlideshowId(int $slideshow_id) Return SlideshowItem objects filtered by the slideshow_id column
 * @method     array findByTitle(string $title) Return SlideshowItem objects filtered by the title column
 * @method     array findByUrl(string $url) Return SlideshowItem objects filtered by the url column
 * @method     array findByPhoto(string $photo) Return SlideshowItem objects filtered by the photo column
 * @method     array findByImageToken(string $image_token) Return SlideshowItem objects filtered by the image_token column
 * @method     array findByDescription(string $description) Return SlideshowItem objects filtered by the description column
 * @method     array findByPosition(int $position) Return SlideshowItem objects filtered by the position column
 * @method     array findByCreatedAt(int $created_at) Return SlideshowItem objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return SlideshowItem objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSlideshowItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSlideshowItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'SlideshowItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SlideshowItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SlideshowItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SlideshowItemQuery) {
			return $criteria;
		}
		$query = new SlideshowItemQuery();
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
	 * @return    SlideshowItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SlideshowItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SlideshowItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SlideshowItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SlideshowItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the slideshow_id column
	 * 
	 * @param     int|array $slideshowId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterBySlideshowId($slideshowId = null, $comparison = null)
	{
		if (is_array($slideshowId)) {
			$useMinMax = false;
			if (isset($slideshowId['min'])) {
				$this->addUsingAlias(SlideshowItemPeer::SLIDESHOW_ID, $slideshowId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($slideshowId['max'])) {
				$this->addUsingAlias(SlideshowItemPeer::SLIDESHOW_ID, $slideshowId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::SLIDESHOW_ID, $slideshowId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SlideshowItemPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SlideshowItemPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the photo column
	 * 
	 * @param     string $photo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($photo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $photo)) {
				$photo = str_replace('*', '%', $photo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::PHOTO, $photo, $comparison);
	}

	/**
	 * Filter the query on the image_token column
	 * 
	 * @param     string $imageToken The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByImageToken($imageToken = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageToken)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageToken)) {
				$imageToken = str_replace('*', '%', $imageToken);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::IMAGE_TOKEN, $imageToken, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(SlideshowItemPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(SlideshowItemPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SlideshowItemPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SlideshowItemPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SlideshowItemPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SlideshowItemPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SlideshowItemPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Slideshow object
	 *
	 * @param     Slideshow $slideshow  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function filterBySlideshow($slideshow, $comparison = null)
	{
		return $this
			->addUsingAlias(SlideshowItemPeer::SLIDESHOW_ID, $slideshow->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Slideshow relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function joinSlideshow($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Slideshow');
		
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
			$this->addJoinObject($join, 'Slideshow');
		}
		
		return $this;
	}

	/**
	 * Use the Slideshow relation Slideshow object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SlideshowQuery A secondary query class using the current class as primary query
	 */
	public function useSlideshowQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSlideshow($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Slideshow', 'SlideshowQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SlideshowItem $slideshowItem Object to remove from the list of results
	 *
	 * @return    SlideshowItemQuery The current query, for fluid interface
	 */
	public function prune($slideshowItem = null)
	{
		if ($slideshowItem) {
			$this->addUsingAlias(SlideshowItemPeer::ID, $slideshowItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSlideshowItemQuery
