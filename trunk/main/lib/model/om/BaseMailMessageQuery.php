<?php


/**
 * Base class that represents a query for the 'mail_message' table.
 *
 * 
 *
 * @method     MailMessageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MailMessageQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     MailMessageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     MailMessageQuery groupById() Group by the id column
 * @method     MailMessageQuery groupByMessage() Group by the message column
 * @method     MailMessageQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     MailMessageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MailMessageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MailMessageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MailMessage findOne(PropelPDO $con = null) Return the first MailMessage matching the query
 * @method     MailMessage findOneOrCreate(PropelPDO $con = null) Return the first MailMessage matching the query, or a new MailMessage object populated from the query conditions when no match is found
 *
 * @method     MailMessage findOneById(int $id) Return the first MailMessage filtered by the id column
 * @method     MailMessage findOneByMessage(resource $message) Return the first MailMessage filtered by the message column
 * @method     MailMessage findOneByCreatedAt(int $created_at) Return the first MailMessage filtered by the created_at column
 *
 * @method     array findById(int $id) Return MailMessage objects filtered by the id column
 * @method     array findByMessage(resource $message) Return MailMessage objects filtered by the message column
 * @method     array findByCreatedAt(int $created_at) Return MailMessage objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMailMessageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMailMessageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'MailMessage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MailMessageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MailMessageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MailMessageQuery) {
			return $criteria;
		}
		$query = new MailMessageQuery();
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
	 * @return    MailMessage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MailMessagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MailMessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MailMessagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MailMessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MailMessagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MailMessageQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MailMessagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the message column
	 * 
	 * @param     mixed $message The value to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MailMessageQuery The current query, for fluid interface
	 */
	public function filterByMessage($message = null, $comparison = null)
	{
		return $this->addUsingAlias(MailMessagePeer::MESSAGE, $message, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MailMessageQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(MailMessagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(MailMessagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MailMessagePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MailMessage $mailMessage Object to remove from the list of results
	 *
	 * @return    MailMessageQuery The current query, for fluid interface
	 */
	public function prune($mailMessage = null)
	{
		if ($mailMessage) {
			$this->addUsingAlias(MailMessagePeer::ID, $mailMessage->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMailMessageQuery
