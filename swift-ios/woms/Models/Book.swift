//
//  Book.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class Book: Identifiable, ObservableObject {
    var uuid: UUID = UUID()
    var cover: String
    var title: String
    var author: String
    var readDate: Date
    
    init(title: String, author: String, readDate: Date, cover: String) {
        self.title = title
        self.author = author
        self.readDate = readDate
        self.cover = cover
    }
}
