//
//  AddBookView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct AddBookView: View {
    @State var title: String
    @State var author: String
    @State var readDate: Date
    
    var body: some View {
        VStack(content: {
            Text("New books")
                .font(.system(size: 32))
            Form(content: {
                TextField("Book title", text: $title)
                TextField("Book Author", text: $author)
                DatePicker("Read Date", selection: $readDate)
                    .datePickerStyle(GraphicalDatePickerStyle())
                
                Button {
                    // Action
                } label: {
                    Text("Save")
                }
                .padding(16)
                .background(Color.blue)
                .foregroundColor(.white)
                .cornerRadius(4)

            })
        })
    }
}

#Preview {
    AddBookView(
        title: "Autre Monde",
        author: "Maxime Chattam",
        readDate: Date()
    )
}
