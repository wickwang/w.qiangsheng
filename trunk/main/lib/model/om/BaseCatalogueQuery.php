<?php


/**
 * Base class that represents a query for the 'catalogue' table.
 *
 * 
 *
 * @method     CatalogueQuery orderByCatId($order = Criteria::ASC) Order by the cat_id column
 * @method     CatalogueQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method     CatalogueQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     CatalogueQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     CatalogueQuery orderBySourceLang($order = Criteria::ASC) Order by the source_lang column
 * @method     CatalogueQuery orderByTargetLang($order = Criteria::ASC) Order by the target_lang column
 * @method     CatalogueQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 * @method     CatalogueQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     CatalogueQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 *
 * @method     CatalogueQuery groupByCatId() Group by the cat_id column
 * @method     CatalogueQuery groupByTypeId() Group by the type_id column
 * @method     CatalogueQuery groupByName() Group by the name column
 * @method     CatalogueQuery groupByDescription() Group by the description column
 * @method     CatalogueQuery groupBySourceLang() Group by the source_lang column
 * @method     CatalogueQuery groupByTargetLang() Group by the target_lang column
 * @method     CatalogueQuery groupByDateCreated() Group by the date_created column
 * @method     CatalogueQuery groupByDateModified() Group by the date_modified column
 * @method     CatalogueQuery groupByAuthor() Group by the author column
 *
 * @method     CatalogueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CatalogueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CatalogueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Catalogue findOne(PropelPDO $con = null) Return the first Catalogue matching the query
 * @method     Catalogue findOneOrCreate(PropelPDO $con = null) Return the first Catalogue matching the query, or a new Catalogue object populated from the query conditions when no match is found
 *
 * @method     Catalogue findOneByCatId(int $cat_id) Return the first Catalogue filtered by the cat_id column
 * @method     Catalogue findOneByTypeId(int $type_id) Return the first Catalogue filtered by the type_id column
 * @method     Catalogue findOneByName(string $name) Return the first Catalogue filtered by the name column
 * @method     Catalogue findOneByDescription(string $description) Return the first Catalogue filtered by the description column
 * @method     Catalogue findOneBySourceLang(string $source_lang) Return the first Catalogue filtered by the source_lang column
 * @method     Catalogue findOneByTargetLang(string $target_lang) Return the first Catalogue filtered by the target_lang column
 * @method     Catalogue findOneByDateCreated(int $date_created) Return the first Catalogue filtered by the date_created column
 * @method     Catalogue findOneByDateModified(int $date_modified) Return the first Catalogue filtered by the date_modified column
 * @method     Catalogue findOneByAuthor(string $author) Return the first Catalogue filtered by the author column
 *
 * @method     array findByCatId(int $cat_id) Return Catalogue objects filtered by the cat_id column
 * @method     array findByTypeId(int $type_id) Return Catalogue objects filtered by the type_id column
 * @method     array findByName(string $name) Return Catalogue objects filtered by the name column
 * @method     array findByDescription(string $description) Return Catalogue objects filtered by the description column
 * @method     array findBySourceLang(string $source_lang) Return Catalogue objects filtered by the source_lang column
 * @method     array findByTargetLang(string $target_lang) Return Catalogue objects filtered by the target_lang column
 * @method     array findByDateCreated(int $date_created) Return Catalogue objects filtered by the date_created column
 * @method     array findByDateModified(int $date_modified) Return Catalogue objects filtered by the date_modified column
 * @method     array findByAuthor(string $author) Return Catalogue objects filtered by the author column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCatalogueQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCatalogueQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Catalogue', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CatalogueQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CatalogueQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CatalogueQuery) {
			return $criteria;
		}
		$query = new CatalogueQuery();
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
	 * @return    Catalogue|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CataloguePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CataloguePeer::CAT_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CataloguePeer::CAT_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the cat_id column
	 * 
	 * @param     int|array $catId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByCatId($catId = null, $comparison = null)
	{
		if (is_array($catId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CataloguePeer::CAT_ID, $catId, $comparison);
	}

	/**
	 * Filter the query on the type_id column
	 * 
	 * @param     int|array $typeId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByTypeId($typeId = null, $comparison = null)
	{
		if (is_array($typeId)) {
			$useMinMax = false;
			if (isset($typeId['min'])) {
				$this->addUsingAlias(CataloguePeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($typeId['max'])) {
				$this->addUsingAlias(CataloguePeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CataloguePeer::TYPE_ID, $typeId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CataloguePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CataloguePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the source_lang column
	 * 
	 * @param     string $sourceLang The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterBySourceLang($sourceLang = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sourceLang)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sourceLang)) {
				$sourceLang = str_replace('*', '%', $sourceLang);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CataloguePeer::SOURCE_LANG, $sourceLang, $comparison);
	}

	/**
	 * Filter the query on the target_lang column
	 * 
	 * @param     string $targetLang The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByTargetLang($targetLang = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($targetLang)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $targetLang)) {
				$targetLang = str_replace('*', '%', $targetLang);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CataloguePeer::TARGET_LANG, $targetLang, $comparison);
	}

	/**
	 * Filter the query on the date_created column
	 * 
	 * @param     int|array $dateCreated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByDateCreated($dateCreated = null, $comparison = null)
	{
		if (is_array($dateCreated)) {
			$useMinMax = false;
			if (isset($dateCreated['min'])) {
				$this->addUsingAlias(CataloguePeer::DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateCreated['max'])) {
				$this->addUsingAlias(CataloguePeer::DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CataloguePeer::DATE_CREATED, $dateCreated, $comparison);
	}

	/**
	 * Filter the query on the date_modified column
	 * 
	 * @param     int|array $dateModified The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function filterByDateModified($dateModified = null, $comparison = null)
	{
		if (is_array($dateModified)) {
			$useMinMax = false;
			if (isset($dateModified['min'])) {
				$this->addUsingAlias(CataloguePeer::DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateModified['max'])) {
				$this->addUsingAlias(CataloguePeer::DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CataloguePeer::DATE_MODIFIED, $dateModified, $comparison);
	}

	/**
	 * Filter the query on the author column
	 * 
	 * @param     string $author The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CataloguePeer::AUTHOR, $author, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Catalogue $catalogue Object to remove from the list of results
	 *
	 * @return    CatalogueQuery The current query, for fluid interface
	 */
	public function prune($catalogue = null)
	{
		if ($catalogue) {
			$this->addUsingAlias(CataloguePeer::CAT_ID, $catalogue->getCatId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCatalogueQuery
