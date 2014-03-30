//
//  MyPhoto.m
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import "MyPhoto.h"

@implementation MyPhoto

@synthesize photoId;
@synthesize source;
@synthesize description;

-(id)initWithId:(NSInteger)_photoId source:(NSString *)_source description:(NSString *)_description {
    NSData *imageData = [[NSData alloc] initWithContentsOfURL:[NSURL URLWithString:_source]];
    self = [super initWithData:imageData];
    
    if (self) {
        photoId = _photoId;
        source = _source;
        description = _description;
    }
    
    return self;
}



@end
