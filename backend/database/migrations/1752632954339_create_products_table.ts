import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'products'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id')
      table.string('name', 150).notNullable()
      table.string('description', 255).defaultTo('-----').nullable()
      table.string('barcode', 30).notNullable().unique()
      table.string('image', 255).nullable()
      table.decimal('buy_price', 10, 2).notNullable()
      table.decimal('sell_price', 10, 2).notNullable()
      table.integer('stock').notNullable()
      table.integer('stock_min').nullable()
      table.boolean('visible').defaultTo(true).notNullable()
      table.integer('presentation_id').unsigned().references('id').inTable('presentations')
      table.integer('supplier_id').unsigned().references('id').inTable('suppliers')

      table.timestamp('created_at')
      table.timestamp('updated_at')
      table.timestamp('deleted_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
