<?php


/**
 * Base class that represents a query for the 'trans_unit' table.
 *
 * 
 *
 * @method     TransUnitQuery orderByMsgId($order = Criteria::ASC) Order by the msg_id column
 * @method     TransUnitQuery orderByCatId($order = Criteria::ASC) Order by the cat_id column
 * @method     TransUnitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TransUnitQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method     TransUnitQuery orderByTarget($order = Criteria::ASC) Order by the target column
 * @method     TransUnitQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     TransUnitQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     TransUnitQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     TransUnitQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 * @method     TransUnitQuery orderByTranslated($order = Criteria::ASC) Order by the translated column
 *
 * @method     TransUnitQuery groupByMsgId() Group by the msg_id column
 * @method     TransUnitQuery groupByCatId() Group by the cat_id column
 * @method     TransUnitQuery groupById() Group by the id column
 * @method     TransUnitQuery groupBySource() Group by the source column
 * @method     TransUnitQuery groupByTarget() Group by the target column
 * @method     TransUnitQuery groupByComments() Group by the comments column
 * @method     TransUnitQuery groupByDateAdded() Group by the date_added column
 * @method     TransUnitQuery groupByDateModified() Group by the date_modified column
 * @method     TransUnitQuery groupByAuthor() Group by the author column
 * @method     TransUnitQuery groupByTranslated() Group by the translated column
 *
 * @method     TransUnitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TransUnitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TransUnitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TransUnit findOne(PropelPDO $con = null) Return the first TransUnit matching the query
 * @method     TransUnit findOneOrCreate(PropelPDO $con = null) Return the first TransUnit matching the query, or a new TransUnit object populated from the query conditions when no match is found
 *
 * @method     TransUnit findOneByMsgId(int $msg_id) Return the first TransUnit filtered by the msg_id column
 * @method     TransUnit findOneByCatId(int $cat_id) Return the first TransUnit filtered by the cat_id column
 * @method     TransUnit findOneById(string $id) Return the first TransUnit filtered by the id column
 * @method     TransUnit findOneBySource(string $source) Return the first TransUnit filtered by the source column
 * @method     TransUnit findOneByTarget(string $target) Return the first TransUnit filtered by the target column
 * @method     TransUnit findOneByComments(string $comments) Return the first TransUnit filtered by the comments column
 * @method     TransUnit findOneByDateAdded(int $date_added) Return the first TransUnit filtered by the date_added column
 * @method     TransUnit findOneByDateModified(int $date_modified) Return the first TransUnit filtered by the date_modified column
 * @method     TransUnit findOneByAuthor(string $author) Return the first TransUnit filtered by the author column
 * @method     TransUnit findOneByTranslated(int $translated) Return the first TransUnit filtered by the translated column
 *
 * @method     array findByMsgId(int $msg_id) Return TransUnit objects filtered by the msg_id column
 * @method     array findByCatId(int $cat_id) Return TransUnit objects filtered by the cat_id column
 * @method     array findById(string $id) Return TransUnit objects filtered by the id column
 * @method     array findBySource(string $source) Return TransUnit objects filtered by the source column
 * @method     array findByTarget(string $target) Return TransUnit objects filtered by the target column
 * @method     array findByComments(string $comments) Return TransUnit objects filtered by the comments column
 * @method     array findByDateAdded(int $date_added) Return TransUnit objects filtered by the date_added column
 * @method     array findByDateModified(int $date_modified) Return TransUnit objects filtered by the date_modified column
 * @method     array findByAuthor(string $author) Return TransUnit objects filtered by the author column
 * @method     array findByTranslated(int $translated) Return TransUnit objects filtered by the translated column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTransUnitQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTransUnitQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TransUnit', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TransUnitQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TransUnitQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TransUnitQuery) {
			return $criteria;
		}
		$query = new TransUnitQuery();
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
	 * @return    TransUnit|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TransUnitPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TransUnitPeer::MSG_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TransUnitPeer::MSG_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the msg_id column
	 * 
	 * @param     int|array $msgId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByMsgId($msgId = null, $comparison = null)
	{
		if (is_array($msgId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TransUnitPeer::MSG_ID, $msgId, $comparison);
	}

	/**
	 * Filter the query on the cat_id column
	 * 
	 * @param     int|array $catId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByCatId($catId = null, $comparison = null)
	{
		if (is_array($catId)) {
			$useMinMax = false;
			if (isset($catId['min'])) {
				$this->addUsingAlias(TransUnitPeer::CAT_ID, $catId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($catId['max'])) {
				$this->addUsingAlias(TransUnitPeer::CAT_ID, $catId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::CAT_ID, $catId, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($id)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $id)) {
				$id = str_replace('*', '%', $id);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the source column
	 * 
	 * @param     string $source The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterBySource($source = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($source)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $source)) {
				$source = str_replace('*', '%', $source);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::SOURCE, $source, $comparison);
	}

	/**
	 * Filter the query on the target column
	 * 
	 * @param     string $target The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByTarget($target = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($target)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $target)) {
				$target = str_replace('*', '%', $target);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::TARGET, $target, $comparison);
	}

	/**
	 * Filter the query on the comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByComments($comments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comments)) {
				$comments = str_replace('*', '%', $comments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the date_added column
	 * 
	 * @param     int|array $dateAdded The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByDateAdded($dateAdded = null, $comparison = null)
	{
		if (is_array($dateAdded)) {
			$useMinMax = false;
			if (isset($dateAdded['min'])) {
				$this->addUsingAlias(TransUnitPeer::DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateAdded['max'])) {
				$this->addUsingAlias(TransUnitPeer::DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::DATE_ADDED, $dateAdded, $comparison);
	}

	/**
	 * Filter the query on the date_modified column
	 * 
	 * @param     int|array $dateModified The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByDateModified($dateModified = null, $comparison = null)
	{
		if (is_array($dateModified)) {
			$useMinMax = false;
			if (isset($dateModified['min'])) {
				$this->addUsingAlias(TransUnitPeer::DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateModified['max'])) {
				$this->addUsingAlias(TransUnitPeer::DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::DATE_MODIFIED, $dateModified, $comparison);
	}

	/**
	 * Filter the query on the author column
	 * 
	 * @param     string $author The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByAuthor($author = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($author)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $author)) {
				$author = str_replace('*', '%', $author);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::AUTHOR, $author, $comparison);
	}

	/**
	 * Filter the query on the translated column
	 * 
	 * @param     int|array $translated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function filterByTranslated($translated = null, $comparison = null)
	{
		if (is_array($translated)) {
			$useMinMax = false;
			if (isset($translated['min'])) {
				$this->addUsingAlias(TransUnitPeer::TRANSLATED, $translated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($translated['max'])) {
				$this->addUsingAlias(TransUnitPeer::TRANSLATED, $translated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TransUnitPeer::TRANSLATED, $translated, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TransUnit $transUnit Object to remove from the list of results
	 *
	 * @return    TransUnitQuery The current query, for fluid interface
	 */
	public function prune($transUnit = null)
	{
		if ($transUnit) {
			$this->addUsingAlias(TransUnitPeer::MSG_ID, $transUnit->getMsgId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTransUnitQuery
