{if count($results) neq 0}
<table class="striped">
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
            <td><img src="{$result['image']}" alt="{$result['image']}" /></td>
            <td>{$result['name']}</td>
            <td>{$result['ingredients_name']}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{else}
<p class="flow-text">No 4 star recipe avaliable.</p>
{/if}
