{** 
 *	(c) 2017 uzERP LLP (support#uzerp.com). All rights reserved. 
 * 
 *	Released under GPLv3 license; see LICENSE. 
 **}
{* $Revision: 1.18 $ *}
{content_wrapper}
	{advanced_search}
	{paging}
	{form controller="rrcomplaints" action="batchcomplete"}
		{assign var=fields value=$rrcomplaints->getHeadings()}
		{data_table}
			{include file='elements/datatable_heading.tpl' collection=$rrcomplaints}
			{foreach name=datagrid item=model from=$rrcomplaints}
				{grid_row model=$model}
					{if isset($fields.date_complete)}
						{if $model->date_complete==''}
							{assign var=class value='open'}
						{else}
							{assign var=class value='complete'}
						{/if}
					{/if}
					{foreach name=gridrow item=tag key=fieldname from=$fields}
						{grid_cell field=$fieldname cell_num=$smarty.foreach.gridrow.iteration model=$model collection=$collection class="$fieldname $class"}
							{if $fieldname=='complaint_number'}
								{$model->type|cat:$model->complaint_number}
							{elseif $fieldname=='problem'}
								{$model->problem|remove_line_breaks|truncate:40}
							{elseif ($model->isEnum($fieldname))}
								{$model->getFormatted($fieldname)}
							{else}
								{$model->getFormatted($fieldname)}
							{/if}
						{/grid_cell}
					{/foreach}
				{/grid_row}
			{foreachelse}
				<tr>
					<td colspan="0">No matching records found!</td>
				</tr>					
			{/foreach}
		{/data_table}
		{if $num_incomplete > 0}
			{submit value="Update Selected" tags="none"}
		{/if}
	{/form}
	<div id="data_grid_footer" class="clearfix">
		{paging}
		{include file='elements/data_table_actions.tpl'}
	</div>
{/content_wrapper}