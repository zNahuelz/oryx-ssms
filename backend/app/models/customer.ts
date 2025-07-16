import { DateTime } from 'luxon'
import { BaseModel, column } from '@adonisjs/lucid/orm'

export default class Customer extends BaseModel {
  @column({ isPrimary: true })
  declare id: number

  @column()
  declare names: string

  @column()
  declare surnames: string | null

  @column()
  declare dni: string

  @column()
  declare address: string | null

  @column()
  declare phoneNumber: string | null

  @column()
  declare email: string | null

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime
}
