<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
</head>
<body>
<div class="row" x-data="handler()">
    <div class="col">
        <table class="table table-bordered align-items-center table-sm">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Voucher</th>
                <th>Jumlah</th>
                <th>Bonus</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <template x-for="(field, index) in fields" :key="index">
                <tr>
                    <td x-text="index + 1"></td>
                    <td>
                        <select x-model="field.voucher" name="voucher[]" class="form-control">
                            <option>Pilih</option>
                            <option>Bronze</option>
                            <option>Silver</option>
                            <option>Gold</option>
                        </select>
                    </td>
                    <td><input x-model="field.jumlah" type="number" name="jumlah[]" class="form-control"></td>
                    <td><input x-model="field.bonus" type="number" name="bonus[]" class="form-control" readonly></td>
                    <td><input x-model="field.total" type="number" name="total[]" class="form-control" readonly></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;
                        </button>
                    </td>
                </tr>
            </template>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" class="text-right">
                    <button type="button" class="btn btn-info" @click="addNewField()">Tambah</button>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>
    function addEvents() {
        document.
    }
    function handler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({});
            },
            removeField(index) {
                this.fields.splice(index, 1);
            }
        }
    }
</script>
</body>
</html>