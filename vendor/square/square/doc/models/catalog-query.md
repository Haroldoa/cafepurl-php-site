
# Catalog Query

A query composed of one or more different types of filters to narrow the scope of targeted objects when calling the `SearchCatalogObjects` endpoint.

Although a query can have multiple filters, only certain query types can be combined per call to [SearchCatalogObjects](../../doc/apis/catalog.md#search-catalog-objects).
Any combination of the following types may be used together:

- [exact_query](../../doc/models/catalog-query-exact.md)
- [prefix_query](../../doc/models/catalog-query-prefix.md)
- [range_query](../../doc/models/catalog-query-range.md)
- [sorted_attribute_query](../../doc/models/catalog-query-sorted-attribute.md)
- [text_query](../../doc/models/catalog-query-text.md)
  All other query types cannot be combined with any others.

When a query filter is based on an attribute, the attribute must be searchable.
Searchable attributes are listed as follows, along their parent types that can be searched for with applicable query filters.

* Searchable attribute and objects queryable by searchable attributes **

- `name`:  `CatalogItem`, `CatalogItemVariation`, `CatalogCategory`, `CatalogTax`, `CatalogDiscount`, `CatalogModifier`, 'CatalogModifierList`,`CatalogItemOption`,`CatalogItemOptionValue`
- `description`: `CatalogItem`, `CatalogItemOptionValue`
- `abbreviation`: `CatalogItem`
- `upc`: `CatalogItemVariation`
- `sku`: `CatalogItemVariation`
- `caption`: `CatalogImage`
- `display_name`: `CatalogItemOption`

For example, to search for [CatalogItem](../../doc/models/catalog-item.md) objects by searchable attributes, you can use
the `"name"`, `"description"`, or `"abbreviation"` attribute in an applicable query filter.

## Structure

`CatalogQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `sortedAttributeQuery` | [`?CatalogQuerySortedAttribute`](../../doc/models/catalog-query-sorted-attribute.md) | Optional | The query expression to specify the key to sort search results. | getSortedAttributeQuery(): ?CatalogQuerySortedAttribute | setSortedAttributeQuery(?CatalogQuerySortedAttribute sortedAttributeQuery): void |
| `exactQuery` | [`?CatalogQueryExact`](../../doc/models/catalog-query-exact.md) | Optional | The query filter to return the search result by exact match of the specified attribute name and value. | getExactQuery(): ?CatalogQueryExact | setExactQuery(?CatalogQueryExact exactQuery): void |
| `setQuery` | [`?CatalogQuerySet`](../../doc/models/catalog-query-set.md) | Optional | The query filter to return the search result(s) by exact match of the specified `attribute_name` and any of<br>the `attribute_values`. | getSetQuery(): ?CatalogQuerySet | setSetQuery(?CatalogQuerySet setQuery): void |
| `prefixQuery` | [`?CatalogQueryPrefix`](../../doc/models/catalog-query-prefix.md) | Optional | The query filter to return the search result whose named attribute values are prefixed by the specified attribute value. | getPrefixQuery(): ?CatalogQueryPrefix | setPrefixQuery(?CatalogQueryPrefix prefixQuery): void |
| `rangeQuery` | [`?CatalogQueryRange`](../../doc/models/catalog-query-range.md) | Optional | The query filter to return the search result whose named attribute values fall between the specified range. | getRangeQuery(): ?CatalogQueryRange | setRangeQuery(?CatalogQueryRange rangeQuery): void |
| `textQuery` | [`?CatalogQueryText`](../../doc/models/catalog-query-text.md) | Optional | The query filter to return the search result whose searchable attribute values contain all of the specified keywords or tokens, independent of the token order or case. | getTextQuery(): ?CatalogQueryText | setTextQuery(?CatalogQueryText textQuery): void |
| `itemsForTaxQuery` | [`?CatalogQueryItemsForTax`](../../doc/models/catalog-query-items-for-tax.md) | Optional | The query filter to return the items containing the specified tax IDs. | getItemsForTaxQuery(): ?CatalogQueryItemsForTax | setItemsForTaxQuery(?CatalogQueryItemsForTax itemsForTaxQuery): void |
| `itemsForModifierListQuery` | [`?CatalogQueryItemsForModifierList`](../../doc/models/catalog-query-items-for-modifier-list.md) | Optional | The query filter to return the items containing the specified modifier list IDs. | getItemsForModifierListQuery(): ?CatalogQueryItemsForModifierList | setItemsForModifierListQuery(?CatalogQueryItemsForModifierList itemsForModifierListQuery): void |
| `itemsForItemOptionsQuery` | [`?CatalogQueryItemsForItemOptions`](../../doc/models/catalog-query-items-for-item-options.md) | Optional | The query filter to return the items containing the specified item option IDs. | getItemsForItemOptionsQuery(): ?CatalogQueryItemsForItemOptions | setItemsForItemOptionsQuery(?CatalogQueryItemsForItemOptions itemsForItemOptionsQuery): void |
| `itemVariationsForItemOptionValuesQuery` | [`?CatalogQueryItemVariationsForItemOptionValues`](../../doc/models/catalog-query-item-variations-for-item-option-values.md) | Optional | The query filter to return the item variations containing the specified item option value IDs. | getItemVariationsForItemOptionValuesQuery(): ?CatalogQueryItemVariationsForItemOptionValues | setItemVariationsForItemOptionValuesQuery(?CatalogQueryItemVariationsForItemOptionValues itemVariationsForItemOptionValuesQuery): void |

## Example (as JSON)

```json
{
  "sorted_attribute_query": null,
  "exact_query": null,
  "set_query": null,
  "prefix_query": null,
  "range_query": null,
  "text_query": null,
  "items_for_tax_query": null,
  "items_for_modifier_list_query": null,
  "items_for_item_options_query": null,
  "item_variations_for_item_option_values_query": null
}
```
