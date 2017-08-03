<?php


/**
 * Base class that represents a query for the 'image_box' table.
 *
 * 
 *
 * @method     ImageBoxQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ImageBoxQuery orderByBoxTypeId($order = Criteria::ASC) Order by the box_type_id column
 * @method     ImageBoxQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ImageBoxQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ImageBoxQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ImageBoxQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ImageBoxQuery orderByImageSrc($order = Criteria::ASC) Order by the image_src column
 * @method     ImageBoxQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ImageBoxQuery groupById() Group by the id column
 * @method     ImageBoxQuery groupByBoxTypeId() Group by the box_type_id column
 * @method     ImageBoxQuery groupByTitle() Group by the title column
 * @method     ImageBoxQuery groupByUrl() Group by the url column
 * @method     ImageBoxQuery groupByWidth() Group by the width column
 * @method     ImageBoxQuery groupByHeight() Group by the height column
 * @method     ImageBoxQuery groupByImageSrc() Group by the image_src column
 * @method     ImageBoxQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ImageBoxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ImageBoxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ImageBoxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ImageBoxQuery leftJoinBoxType($relationAlias = null) Adds a LEFT JOIN clause to the query using the BoxType relation
 * @method     ImageBoxQuery rightJoinBoxType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BoxType relation
 * @method     ImageBoxQuery innerJoinBoxType($relationAlias = null) Adds a INNER JOIN clause to the query using the BoxType relation
 *
 * @method     ImageBox findOne(PropelPDO $con = null) Return the first ImageBox matching the query
 * @method     ImageBox findOneOrCreate(PropelPDO $con = null) Return the first ImageBox matching the query, or a new ImageBox object populated from the query conditions when no match is found
 *
 * @method     ImageBox findOneById(int $id) Return the first ImageBox filtered by the id column
 * @method     ImageBox findOneByBoxTypeId(int $box_type_id) Return the first ImageBox filtered by the box_type_id column
 * @method     ImageBox findOneByTitle(string $title) Return the first ImageBox filtered by the title column
 * @method     ImageBox findOneByUrl(string $url) Return the first ImageBox filtered by the url column
 * @method     ImageBox findOneByWidth(int $width) Return the first ImageBox filtered by the width column
 * @method     ImageBox findOneByHeight(int $height) Return the first ImageBox filtered by the height column
 * @method     ImageBox findOneByImageSrc(string $image_src) Return the first ImageBox filtered by the image_src column
 * @method     ImageBox findOneByCreatedAt(int $created_at) Return the first ImageBox filtered by the created_at column
 *
 * @method     array findById(int $id) Return ImageBox objects filtered by the id column
 * @method     array findByBoxTypeId(int $box_type_id) Return ImageBox objects filtered by the box_type_id column
 * @method     array findByTitle(string $title) Return ImageBox objects filtered by the title column
 * @method     array findByUrl(string $url) Return ImageBox objects filtered by the url column
 * @method     array findByWidth(int $width) Return ImageBox objects filtered by the width column
 * @method     array findByHeight(int $height) Return ImageBox objects filtered by the height column
 * @method     array findByImageSrc(string $image_src) Return ImageBox objects filtered by the image_src column
 * @method     array findByCreatedAt(int $created_at) Return ImageBox objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseImageBoxQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseImageBoxQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ImageBox', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ImageBoxQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ImageBoxQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ImageBoxQuery) {
			return $criteria;
		}
		$query = new ImageBoxQuery();
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
	 * @return    ImageBox|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ImageBoxPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ImageBoxPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ImageBoxPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ImageBoxPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the box_type_id column
	 * 
	 * @param     int|array $boxTypeId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByBoxTypeId($boxTypeId = null, $comparison = null)
	{
		if (is_array($boxTypeId)) {
			$useMinMax = false;
			if (isset($boxTypeId['min'])) {
				$this->addUsingAlias(ImageBoxPeer::BOX_TYPE_ID, $boxTypeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($boxTypeId['max'])) {
				$this->addUsingAlias(ImageBoxPeer::BOX_TYPE_ID, $boxTypeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ImageBoxPeer::BOX_TYPE_ID, $boxTypeId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ImageBoxPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ImageBoxPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the width column
	 * 
	 * @param     int|array $width The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByWidth($width = null, $comparison = null)
	{
		if (is_array($width)) {
			$useMinMax = false;
			if (isset($width['min'])) {
				$this->addUsingAlias(ImageBoxPeer::WIDTH, $width['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($width['max'])) {
				$this->addUsingAlias(ImageBoxPeer::WIDTH, $width['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ImageBoxPeer::WIDTH, $width, $comparison);
	}

	/**
	 * Filter the query on the height column
	 * 
	 * @param     int|array $height The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByHeight($height = null, $comparison = null)
	{
		if (is_array($height)) {
			$useMinMax = false;
			if (isset($height['min'])) {
				$this->addUsingAlias(ImageBoxPeer::HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($height['max'])) {
				$this->addUsingAlias(ImageBoxPeer::HEIGHT, $height['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ImageBoxPeer::HEIGHT, $height, $comparison);
	}

	/**
	 * Filter the query on the image_src column
	 * 
	 * @param     string $imageSrc The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByImageSrc($imageSrc = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageSrc)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageSrc)) {
				$imageSrc = str_replace('*', '%', $imageSrc);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ImageBoxPeer::IMAGE_SRC, $imageSrc, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ImageBoxPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ImageBoxPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ImageBoxPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related BoxType object
	 *
	 * @param     BoxType $boxType  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function filterByBoxType($boxType, $comparison = null)
	{
		return $this
			->addUsingAlias(ImageBoxPeer::BOX_TYPE_ID, $boxType->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BoxType relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
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
	 * @param     ImageBox $imageBox Object to remove from the list of results
	 *
	 * @return    ImageBoxQuery The current query, for fluid interface
	 */
	public function prune($imageBox = null)
	{
		if ($imageBox) {
			$this->addUsingAlias(ImageBoxPeer::ID, $imageBox->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseImageBoxQuery
