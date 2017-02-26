{if count($results) neq 0}
<table class="bordered">
    <thead>
        <tr>
            <th data-field="id">Img</th>
            <th data-field="name">Name</th>
            <th data-field="price">Ingredients</th>
        </tr>
    </thead>

    <tbody>
        {foreach $results as $result}
        <tr>
            <td><img src="img/{$result['image']}" alt="{$result['name']}"/></td>
            <td>{$result['name']}</td>
            <td>{$result['ingredients_name']}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{else}
<p class="flow-text">No recipe avaliable.</p>
{/if}
<hr>
