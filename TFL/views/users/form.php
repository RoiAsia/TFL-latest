<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>TFL</title>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                theme: {
                    extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                    }
                }
                }
            </script>

        </head>
        <body class="h-screen">
            <form>
                <div class=" w-full flex justify-center rounded border">
                    <div class="w-full min-h-screen h-auto p-5 md:w-1/2 ">
                        <div class="flex justify-center">
                            <img src="../../assets/image/tfl_logo.png" class="h-[100px] w-auto md:h-[200px]">
                        </div>
                        <div class="mt-1">
                            <label class="mt-16">Full Name</label>
                            <div class="border rounded my-2">
                                <input type="text" class="rounded border w-full p-1"/>
                            </div>
                        </div>
                        <div class="mt-3 grid grid-cols-2 space-x-4">
                            <div>
                                <label class="mt-16">Department</label>
                                <div class="rounded border my-2">
                                    <select class="rounded border w-full p-1.5">
                                        <option>MIS</option>
                                        <option>FINANCE</option>
                                        <option>MARKETING</option>
                                        <option>ENGINEERING</option>
                                        <option>FO</option>
                                        <option>TO</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="mt-16">Date</label>
                                <div class="rounded border my-2">

                                    <?php
                                            date_default_timezone_set('Asia/Manila');
                                    ?>

                                    <input type="datetime-local" name="datetime" class="rounded border w-full p-1" value="<?php echo date('Y-m-d\TH:i'); ?>" />
                                </div>
                            </div>
                        </div>
                    
                        <div class="my-1">
                            <div id="walletRows">
                                <div class="grid grid-cols-2 gap-4 mt-3 mb-5 md:grid-cols-4 text-center border-2 border-black p-2 rounded-md">
                                    <div>
                                        <label>ITEM</label>
                                        <input type="number" class="rounded border w-full p-1" min="0" placeholder="₱(wallet)">
                                    </div>
                                    <div>
                                        <label>QUANTITY</label>
                                        <input type="number" class="rounded border w-full p-1" min="0" id="numberInput"/>
                                    </div>
                                    <div>
                                        <label>BRAND</label>
                                        <input type="text" class="rounded border w-full p-1">
                                    </div>
                                    <div>
                                        <label>COLOR</label>
                                        <input type="text" class="rounded border w-full p-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-1">
                            <div id="dynamicRows">
                                <div class="grid grid-cols-2 gap-4 mt-3 mb-5 md:grid-cols-4 text-center border-2 border-black p-2 rounded-md">
                                    <div>
                                        <label>ITEM</label>
                                        <input type="text" class="rounded border w-full p-1">
                                    </div>
                                    <div>
                                        <label>QUANTITY</label>
                                        <input type="number" class="rounded border w-full p-1" min="0" id="numberInput"/>
                                    </div>
                                    <div>
                                        <label>BRAND</label>
                                        <input type="text" class="rounded border w-full p-1">
                                    </div>
                                    <div>
                                        <label>COLOR</label>
                                        <input type="text" class="rounded border w-full p-1">
                                    </div>
                                </div>
                            </div>
                            <div class="my-4 flex justify-between">
                                <button type="button" id="addRow" class="bg-blue-500 text-white p-2 rounded">Add Row</button>
                                <button type="button" id="removeRow" class="bg-red-500 text-white p-2 rounded" disabled>Remove Row</button>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="bg-lime-600 text-white p-2 rounded my-5">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                document.querySelector('#dynamicRows, #walletRows').addEventListener('input', function(e) {
                    if (e.target.type === 'number' && e.target.value < 0) {
                        e.target.value = 0;
                    }
                });

                document.getElementById('addRow').addEventListener('click', function() {
                    const dynamicRows = document.getElementById('dynamicRows');
                    const newRow = document.createElement('div');
                    newRow.classList.add('grid', 'grid-cols-2', 'gap-4', 'mt-3', 'mb-5', 'text-center', 'border-2', 'border-black', 'p-2', 'rounded-md');
                    newRow.innerHTML = `
                        <div>
                            <label>ITEM</label>
                            <input type="text" class="rounded border w-full p-1">
                        </div>
                        <div>
                            <label>QUANTITY</label>
                            <input type="number" class="rounded border w-full p-1" min="0" id="numberInput"/>
                        </div>
                        <div>
                            <label>BRAND</label>
                            <input type="text" class="rounded border w-full p-1">
                        </div>
                        <div>
                            <label>COLOR</label>
                            <input type="text" class="rounded border w-full p-1">
                        </div>
                    `;
                    dynamicRows.appendChild(newRow);
                    document.getElementById('removeRow').disabled = false;
                });

                document.getElementById('removeRow').addEventListener('click', function() {
                    const dynamicRows = document.getElementById('dynamicRows');
                    const rows = dynamicRows.getElementsByClassName('grid');
                    if (rows.length > 1) {
                        dynamicRows.removeChild(rows[rows.length - 1]);
                    }

                    if (rows.length === 1) {
                        document.getElementById('removeRow').disabled = true;
                    }
                });

            </script>
        </body>
    </html>