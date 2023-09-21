<div id="root">
        <h3 class="subheading">Input Demo</h3>
        <input type="text" class="form-control AutoSuggest_Pengguna" />
    </div>
    <script type="text/javascript">
        const instance = new AutoSuggest({
            onChange: function (suggestion) {
                const change = suggestion.insertHtml || suggestion.insertText;
                console.log('"' + change + '" has been inserted into #' + this.id);
            },
            suggestions: [
                {
                    trigger: '@',
                    values: [


                    <?php
					$search_field_where = array("Status","Organisasi_Kode");

					$search_criteria_where = array("=","=");

					$search_value_where = array("Aktif","$Organisasi_Kode");

					$search_connector_where = array("AND","");

					$result = $a_data_pengguna->read_where($search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

					if($result[0] == "Sukses"){
						$data_hasil = $result[1];

						foreach($data_hasil as $data){
							?>


                        {
                            on: [''],
                            show: '<?php echo $data['Nama_Depan']." ".$data['Nama_Belakang'] ?>',
                            insertText: '@<?php echo $data['Username']?> ',
                            insertHtml: '<a href="/" target="_blank">@<?php echo $data['Username']?></a>'
                        },
                    <?php 
                }
                    } 
                    ?>
                    ]
                }, 
                function(keyword, callback) {
                    keyword = keyword.toLowerCase();

                    var results = [];
                    var dataset = this.value || this.textContent;
                    dataset = dataset.toLowerCase().split(/[^a-zA-Z0-9_]+/);
                    dataset.forEach(function(word) {
                        if (
                            word.length >= 4 &&
                            !word.indexOf(keyword) &&
                            word !== keyword &&
                            results.indexOf(word) === -1
                        ) {
                            results.push(word);
                        }
                    });

                    setTimeout(function () {
                        callback(results);
                    }, 1000);
                }
            ]
        }, $('.AutoSuggest_Pengguna'));
</script>