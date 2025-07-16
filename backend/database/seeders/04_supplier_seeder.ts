import Supplier from '#models/supplier'
import { BaseSeeder } from '@adonisjs/lucid/seeders'

export default class extends BaseSeeder {
  async run() {
    Supplier.createMany([
      {
        name: 'ACEROS AREQUIPA',
        ruc: '20370146994',
        phoneNumber: '999888777',
        email: 'ventas@aceros-arequipa.com',
        description: 'Proveedor de Metales',
      },
      {
        name: 'FERROPOLIS PE',
        ruc: '20601968607',
        phoneNumber: '999888666',
        email: 'ventas@ferropolis2025.com',
        description: 'Proveedor General',
      },
      {
        name: 'TUS HERRAMIENTAS PE',
        ruc: '20370146127',
        phoneNumber: '999111777',
        email: 'ventas@tus-herramientas.pe',
        description: 'Proveedor de Herramientas',
      },
    ])
  }
}
