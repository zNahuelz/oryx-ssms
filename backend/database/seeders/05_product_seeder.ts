import Product from '#models/product'
import { BaseSeeder } from '@adonisjs/lucid/seeders'

export default class extends BaseSeeder {
  async run() {
    Product.createMany([
      {
        name: 'CLAVO ACERADO 1/2',
        buyPrice: 3.2,
        sellPrice: 4.5,
        stock: 50,
        stockMin: 50,
        supplierId: 1,
        presentationId: 9,
        barcode: '0000000001234'
      },
      {
        name: 'CEMENTO SOL',
        buyPrice: 20,
        sellPrice: 35,
        stock: 120,
        stockMin: 100,
        supplierId: 2,
        presentationId: 3,
        barcode: '0000000001237'
      },
      {
        name: 'CEMENTO ANDINO',
        buyPrice: 19,
        sellPrice: 30,
        stock: 80,
        stockMin: 100,
        supplierId: 2,
        presentationId: 3,
        barcode: '0000000001236'
      },
      {
        name: 'BARRA DE CONSTRUCCIÓN SP 1/2" x 9MTS',
        buyPrice: 38,
        sellPrice: 42.5,
        stock: 50,
        stockMin: 50,
        supplierId: 1,
        presentationId: 1,
        barcode: '0000000001235'
      },
      {
        name: 'BARRA DE CONSTRUCCIÓN SP 6MM x 9MTS',
        buyPrice: 15,
        sellPrice: 30,
        stock: 50,
        stockMin: 50,
        supplierId: 1,
        presentationId: 1,
        barcode: '0000000001233'
      },
      {
        name: 'BARRA DE CONSTRUCCIÓN SP 3/4" x 9MTS',
        buyPrice: 80,
        sellPrice: 90,
        stock: 30,
        stockMin: 30,
        supplierId: 1,
        presentationId: 1,
        barcode: '0000000001232'
      },
      {
        name: 'BARRA DE CONSTRUCCIÓN SP 12MM x 9MTS',
        buyPrice: 30,
        sellPrice: 37,
        stock: 25,
        stockMin: 30,
        supplierId: 1,
        presentationId: 1,
        barcode: '0000000001231'
      },
      {
        name: 'ALAMBRE CORRUGADO 4.7MM x 8.80MTS',
        buyPrice: 3,
        sellPrice: 5.5,
        stock: 10,
        stockMin: 15,
        supplierId: 1,
        presentationId: 1,
        barcode: '0000000001230'
      },
    ])
  }
}
