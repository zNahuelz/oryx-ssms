import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'voucher_details'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id')
      table.integer('amount').notNullable()
      table.decimal('unit_price', 10, 2).notNullable()
      table.decimal('subtotal', 10, 2).notNullable()
      table.integer('voucher_id').unsigned().references('id').inTable('vouchers')
      table.integer('product_id').unsigned().references('id').inTable('products')

      table.timestamp('created_at')
      table.timestamp('updated_at')
      table.timestamp('deleted_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
