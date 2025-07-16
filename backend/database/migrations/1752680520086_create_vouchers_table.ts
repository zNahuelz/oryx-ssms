import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'vouchers'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id')
      table.decimal('subtotal', 10, 2).notNullable()
      table.decimal('igv', 10, 2).notNullable()
      table.decimal('tax', 10, 2).notNullable()
      table.decimal('total', 10, 2).notNullable()
      table.decimal('change', 10, 2).notNullable().defaultTo(0)
      table.boolean('paid').notNullable().defaultTo(false)
      table.string('set', 15).notNullable()
      table.string('correlative', 15).notNullable()
      table.string('payment_serial').nullable()
      table.string('payment_image').nullable()
      table.integer('customer_id').unsigned().references('id').inTable('customers')
      table.integer('voucher_type_id').unsigned().references('id').inTable('voucher_types')
      table.integer('payment_type_id').unsigned().references('id').inTable('payment_types')

      table.timestamp('created_at')
      table.timestamp('updated_at')
      table.timestamp('deleted_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
