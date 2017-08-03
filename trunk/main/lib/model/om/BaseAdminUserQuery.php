<?php


/**
 * Base class that represents a query for the 'admin_user' table.
 *
 * 
 *
 * @method     AdminUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdminUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     AdminUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     AdminUserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     AdminUserQuery groupById() Group by the id column
 * @method     AdminUserQuery groupByUsername() Group by the username column
 * @method     AdminUserQuery groupByPassword() Group by the password column
 * @method     AdminUserQuery groupByEmail() Group by the email column
 *
 * @method     AdminUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdminUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdminUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdminUser findOne(PropelPDO $con = null) Return the first AdminUser matching the query
 * @method     AdminUser findOneOrCreate(PropelPDO $con = null) Return the first AdminUser matching the query, or a new AdminUser object populated from the query conditions when no match is found
 *
 * @method     AdminUser findOneById(int $id) Return the first AdminUser filtered by the id column
 * @method     AdminUser findOneByUsername(string $username) Return the first AdminUser filtered by the username column
 * @method     AdminUser findOneByPassword(string $password) Return the first AdminUser filtered by the password column
 * @method     AdminUser findOneByEmail(string $email) Return the first AdminUser filtered by the email column
 *
 * @method     array findById(int $id) Return AdminUser objects filtered by the id column
 * @method     array findByUsername(string $username) Return AdminUser objects filtered by the username column
 * @method     array findByPassword(string $password) Return AdminUser objects filtered by the password column
 * @method     array findByEmail(string $email) Return AdminUser objects filtered by the email column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdminUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'AdminUser', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdminUserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdminUserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdminUserQuery) {
			return $criteria;
		}
		$query = new AdminUserQuery();
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
	 * @return    AdminUser|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdminUserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdminUserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdminUserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdminUserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdminUser $adminUser Object to remove from the list of results
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function prune($adminUser = null)
	{
		if ($adminUser) {
			$this->addUsingAlias(AdminUserPeer::ID, $adminUser->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdminUserQuery
