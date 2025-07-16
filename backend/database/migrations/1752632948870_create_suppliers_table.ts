import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'suppliers'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id')
      table.string('name', 150).notNullable()
      table.string('ruc', 15).notNullable().unique()
      table.string('address', 150).nullable()
      table.string('phone_number', 15).notNullable()
      table.string('email', 50).notNullable()
      table.string('description', 150).notNullable()

      table.timestamp('created_at')
      table.timestamp('updated_at')
      table.timestamp('deleted_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
