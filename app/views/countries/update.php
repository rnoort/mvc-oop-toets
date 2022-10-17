<?= $data["title"]; ?>

<form action="<?= URLROOT; ?>/countries/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="Name" id="Name" value="<?= $data["row"]->Name; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="CapitalCity" id="CapitalCity" value="<?= $data["row"]->CapitalCity; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="Continent" id="Continent" value="<?= $data["row"]->Continent; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="Population" id="Population" value="<?= $data["row"]->Population; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data["row"]->id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>
        </tbody>
    </table>
</form>